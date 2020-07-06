@extends('layout.site')

@section('nome', 'Organizacaos')

@section('conteudo')
<div class="container">
    <h3 class="center">Adicionar Organização</h3>
    <div class="row">
        <form class="" action="{{route('admin.organizacaos.salvar')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field()}}

        @include('admin.organizacaos._form')

        <button class="btn blue darken-4">Salvar</button>

    </form>
    </div>

</div>
@endsection
