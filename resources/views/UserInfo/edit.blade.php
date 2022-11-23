@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route("userinfo.update", $userInfo->Users_id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" value="{{$userInfo->Users_id}}" disabled>
                <div id="id" class="form-text">Não será necessário cadastrar um id</div>
            </div>
            <div class="form-group">
                <label for="id-input-profileImg" class="form-label">Profile Img</label>
                <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="Digite o profileImg" value="{{$userInfo->profileImg}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" placeholder="#" value="{{$userInfo->status}}" disabled>
            </div>
            <div class="form-group">
                <label for="id-input-dataNasc" class="form-label">dataNasc</label>
                <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="Digite os dataNasc" value="{{$userInfo->dataNasc}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-genero" class="form-label">Genero</label>
                <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="Digite a genero" value="{{$userInfo->genero}}" required>
            </div>
            <div class="my-1">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route("userinfo.show", $userInfo->Users_id)}}" class="btn btn-primary">Voltar</a>
            </div>
          </form>
    </div>
@endsection