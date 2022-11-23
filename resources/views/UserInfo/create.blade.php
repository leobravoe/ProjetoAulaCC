@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($message))
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                <span>{{$message[0]}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{route("userinfo.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
                <div id="id" class="form-text">Não será necessário cadastrar um id</div>
            </div>
            <div class="form-group">
                <label for="id-input-profileImg" class="form-label">Profile Img</label>
                <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="Digite o profileImg" required>
            </div>
            <div class="form-group">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" placeholder="#" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-dataNasc" class="form-label">dataNasc</label>
                <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="Digite os dataNasc" required>
            </div>
            <div class="form-group">
                <label for="id-input-genero" class="form-label">Genero</label>
                <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="Digite a genero" required>
            </div>
            <div class="my-1">
                <a href="{{route("home")}}" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
    </div>
@endsection