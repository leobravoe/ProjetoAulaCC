@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route("endereco.update", $endereco->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="id-input-id" class="form-label">ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" value="{{$endereco->id}}" disabled>
              <div id="id" class="form-text">Não é possível alterar o id</div>
            </div>
            <div class="mb-3">
              <label for="id-input-bairro" class="form-label">Bairro</label>
              <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Digite o bairro" value="{{$endereco->bairro}}" required>
            </div>
            <div class="mb-3">
              <label for="id-input-logradouro" class="form-label">Logradouro</label>
              <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Digite o preço" value="{{$endereco->logradouro}}" required>
            </div>
            <div class="mb-3">
              <label for="id-input-numero" class="form-label">Número</label>
              <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Digite os numero" value="{{$endereco->numero}}" required>
            </div>
            <div class="mb-3">
              <label for="id-input-complemento" class="form-label">Complemento</label>
              <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="Digite a complemento" value="{{$endereco->complemento}}">
            </div>
            <a href="{{route("endereco.index")}}" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </form>
    </div>
@endsection