@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route("endereco.store")}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="id-input-id" class="form-label">ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
              <div id="id" class="form-text">Não será necessário cadastrar um id</div>
            </div>
            <div class="mb-3">
              <label for="id-input-bairro" class="form-label">Bairro</label>
              <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Digite o bairro" required>
            </div>
            <div class="mb-3">
              <label for="id-input-logradouro" class="form-label">Logradouro</label>
              <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Digite o logradouro" required>
            </div>
            <div class="mb-3">
              <label for="id-input-numero" class="form-label">Número</label>
              <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Digite os número" required>
            </div>
            <div class="mb-3">
              <label for="id-input-complemento" class="form-label">Complemento</label>
              <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="Digite a complemento" required>
            </div>
            <a href="{{route("endereco.index")}}" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </form>
    </div>
@endsection