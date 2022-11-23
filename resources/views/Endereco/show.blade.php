@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" value="{{$endereco->id}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-Users_id" class="form-label">Users_id</label>
            <input type="text" class="form-control" id="id-input-Users_id" value="{{$endereco->Users_id}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="id-input-bairro" value="{{$endereco->bairro}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-logradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="id-input-logradouro" value="{{$endereco->logradouro}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="id-input-numero" value="{{$endereco->numero}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="id-input-complemento" value="{{$endereco->complemento}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-updated_at" class="form-label">Updated at</label>
            <input type="text" class="form-control" id="id-input-updated_at" value="{{$endereco->updated_at}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-created_at" class="form-label">Created at</label>
            <input type="text" class="form-control" id="id-input-created_at" value="{{$endereco->created_at}}" disabled>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route("endereco.index")}}">Voltar</a>
        </div>
    </div>
@endsection




