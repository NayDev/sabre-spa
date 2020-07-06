@extends('layout.site')

@section('nome', 'Organizacaos')

@section('conteudo')

<div class="card-header" wfd-id="13">
    <h2 class="text-uppercase mb-0">Organizações</h2>
</div>
<div class="card-body">
    <div class="row">
        <table table table-ordered table-hover id="tabelaOrganizacaos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    <button class="btn sm btn-primary" role="button" onClick="novaOrganizacao()">Nova Organização</button>
</div>
<div class="modal" role="dialog" id="dlgOrganizacaos" style="top:10%">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <form class="form-horizontal" id="formOrganizacao">
                <div class="modal-header">
                    <h5 class="modal-title">Nova Organização</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">

                        <label for="nomeOrganizacao" id="disable" class="control-label">Nome da Organização</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeOrganizacao" placeholder="Nome da Organização">
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="salvar">Salvar</button>
                    <button type="cancel" class="btn btn-secondary"  id="enable" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('javascript')
<script type="text/javascript">


    function novaOrganizacao() {
        $('#id').val('');
        $('#nomeOrganizacao').val('').prop("disabled", false);
        $('#salvar').show();
        $('#dlgOrganizacaos').show();
    }
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" +
              '<button style="background-color: green" class="btn btn-success" onClick="show(' + p.id + ')"> Exibir </button> ' +
              '<button class="btn btn-sm btn-primary" onClick="editar(' + p.id + ')"> Editar </button> ' +
              '<button style="background-color: red" class="btn btn-danger" onClick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }

    function editar(id) {
        $.getJSON('/api/organizacaos/'+id, function(organizacaos) {
            console.log(organizacaos);
            $('#id').val(organizacaos.id);
            $('#nomeOrganizacao').val(organizacaos.nome).prop("disabled", false);
            $('#salvar').show();
            $('#dlgOrganizacaos').show();
        });
    }

    function show(id) {
        $.getJSON('/api/organizacaos/'+id, function(organizacaos) {
            $('#id').val(organizacaos.id);
            $('#nomeOrganizacao').val(organizacaos.nome).attr("disabled", "disabled");
            $('#salvar').hide();
            $('#dlgOrganizacaos').show();
        });
    }


    function remover(id) {
        $.ajax({
            type: "DELETE",
            url: "api/organizacaos/" + id,
            context: this,
            success: function() {
                linhas = $("#tabelaOrganizacaos>tbody>tr");
                e = linhas.filter( function(i, elemento) {
                    return elemento.cells[0].textContent == id;
                });
                if (e)
                    e.remove();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }


    function carregarOrganizacaos() {
        $.getJSON('/api/organizacaos', function(organizacaos) {
            for(i=0;i<organizacaos.length;i++) {
                linha = montarLinha(organizacaos[i]);
                $('#tabelaOrganizacaos>tbody').append(linha);
            }
        });
    }

    function criarOrganizacao() {
        prod = {
            nome: $("#nomeOrganizacao").val()
        };
        $.post("/api/organizacaos", prod, function(prod) {
            organizacao = JSON.parse(prod);
            linha = montarLinha(organizacao);
            $('#tabelaOrganizacaos>tbody').append(linha);
        });
    }

    function salvarOrganizacao() {
        prod = {
            id : $("#id").val(),
            nome: $("#nomeOrganizacao").val(),
        };
        $.ajax({
            type: "PUT",
            url: "/api/organizacaos/" + prod.id,
            context: this,
            data: prod,
            success: function(data) {
                prod = JSON.parse(data);
                linhas = $("#tabelaOrganizacaos>tbody>tr");
                e = linhas.filter( function(i, e) {
                    return ( e.cells[0].textContent == prod.id );
                });
                if (e) {
                    e[0].cells[0].textContent = prod.id;
                    e[0].cells[1].textContent = prod.nome;
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    $(document).ready( function() {
        $("#formOrganizacao").on('submit', function(e){
            e.preventDefault();
            if($("#id").val() != '')
            salvarOrganizacao();
            else
            criarOrganizacao();
            $("#dlgOrganizacaos").hide();
        });

    });


    $(function(){
        carregarOrganizacaos();
    })
</script>
@endsection
