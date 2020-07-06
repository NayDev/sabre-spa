@extends('layout.site')

@section('nome', 'Organizacaos')

@section('conteudo')

<div class="card-header" wfd-id="10">
    <h2 class="text-uppercase mb-0">Organizações</h2>
</div>
<div class="card-body">
    <div class="row">
        <table table table-ordered table-hover id="tabelaOrganizacaos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome
                        <input name="texto" id="texto" type="text" class="form-control-sm listarRegistros" >
                    </th>
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
<br />
<br />
<br />
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


    function novaOrganizacao() { // Função para uma nova Organização
        $('#id').val('');
        $('#nomeOrganizacao').val('').prop("disabled", false);
        $('#salvar').show();
        $('#dlgOrganizacaos').show();
    }
    function montarLinha(p) { //Função para montar a linha após salvar os dados para mostrar na tela
        var linha ='<tr style="background-color: rgba(0, 0, 0, 0.05)" id="id'+p.id+'">' +
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" +
              '<button style="background-color: green" class="btn btn-success" onClick="show(' + p.id + ')"> Exibir </button> ' +
              '<button style="background-color: blue" class="btn btn-primary" onClick="editar(' + p.id + ')"> Editar </button> ' +
              '<button style="background-color: red" class="btn btn-danger" onClick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }

    function editar(id) { // Função para editar o valor
        $.getJSON('/api/organizacaos/'+id, function(organizacaos) {
            $('#id').val(organizacaos.id);
            $('#nomeOrganizacao').val(organizacaos.nome).prop("disabled", false);
            $('#salvar').show();
            $('#dlgOrganizacaos').show();
        });
    }

    function show(id) { //Função para exibir os valores salvos.
        $.getJSON('/api/organizacaos/'+id, function(organizacaos) {
            $('#id').val(organizacaos.id);
            $('#nomeOrganizacao').val(organizacaos.nome).attr("disabled", "disabled");
            $('#salvar').hide();
            $('#dlgOrganizacaos').show();
        });
    }


    function remover(id) { //Função que deleta o valor pelo seu id.
        $.ajax({
            type: "DELETE",
            url: "api/organizacaos/" + id,
            context: this,
            success: function() {
                $('#id'+id).remove();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }


    function carregarOrganizacaos() { //Função para carregar todos os dados.
        $.getJSON('/api/organizacaos', function(organizacaos) {
            for(i=0;i<organizacaos.length;i++) {
                linha = montarLinha(organizacaos[i]);
                $('#tabelaOrganizacaos>tbody').append(linha);
            }
        });
    }

    function criarOrganizacao() { //função para criar um novo dado
        prod = {
            nome: $("#nomeOrganizacao").val()
        };
        $.post("/api/organizacaos", prod, function(prod) {
            organizacao = JSON.parse(prod);
            linha = montarLinha(organizacao);
            $('#tabelaOrganizacaos>tbody').append(linha);
        });
    }

    var apiUrl = "/api/servicos"; //Começo da função de pesquisar
    var nomeModulo = "Organizacao";
    $(document).on('keyup', '.listarRegistros', function () {
        var filtro=$(this).val();
        listarRegistros(filtro);
    });

    function listarRegistros(filtro){ //Função que faz o pesquisar filtar os valores pelo nome.
        var nomeFuncao=arguments.callee.name;
        var datastring='';
        datastring += 'filtro='+filtro;
        datastring += '&funcao='+nomeFuncao;
        datastring += '&model='+nomeModulo;
        //console.log(datastring);
        $.ajax({
            url: apiUrl,
            dataType: "json",
            type: "POST",
            data: datastring,
            async: true,
            success: function(pacote) {
                $('#tabelaOrganizacaos').find("tr:gt(0)").remove();
                $.each(pacote.data, function(contador,registro) {
                    linhaNova = montarLinha(registro);
                    $('#tabelaOrganizacaos tr:last').after(linhaNova);
                });
            console.log(JSON.stringify(pacote));
            },
            error: function(e) {
                alert(e.status+':'+nomeFuncao);
            }
        });
    }

    function salvarOrganizacao() { //função para salvar no banco os valores digitados.
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
    $(document).ready( function() { //função SPA
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
