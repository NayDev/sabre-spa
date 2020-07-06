@extends('layout.site')

@section('nome', 'Organizacaos')

@section('conteudo')
<div class="container">
    <h3 class="center">Editando Organização</h3>
    <div class="row">
       <form class="" action="{{route('admin.organizacaos.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.organizacaos._form')

            <button class="btn green">Atualizar</button>

       </form>

    </div>
</div>
@endsection
