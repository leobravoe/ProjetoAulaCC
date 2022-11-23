@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route("produto.update", $produto->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" value="{{$produto->id}}" disabled>
                <div id="id" class="form-text">Não será necessário cadastrar um id</div>
            </div>
            <div class="form-group">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder="Digite o nome" value="{{$produto->nome}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input name="preco" type="text" class="form-control" id="id-input-preco" placeholder="Digite o preço" value="{{$produto->preco}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-tipo">Tipo</label>
                <select class="form-select" name="Tipo_Produtos_id" aria-label="Selecione um tipo">
                    @foreach ($tipoProdutos as $tipoProduto)
                        {{-- Se o option que estiver sendo impresso for igual ao tipo do elemento enviado para página --}}
                        {{-- Então o option deve ser marcado como selecionado --}}
                        @if ( $tipoProduto->id == $produto->Tipo_Produtos_id )
                            <option value="{{$tipoProduto->id}}" selected>{{$tipoProduto->descricao}}</option>
                        @else
                            <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
                <input name="ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder="Digite os ingredientes" value="{{$produto->ingredientes}}" required>
            </div>
            <div class="form-group">
                <label for="id-input-urlImage" class="form-label">Url Image</label>
                <input name="urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder="Digite a urlImage" value="{{$produto->urlImage}}" required>
            </div>
            <div class="my-1">
                <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
    </div>
@endsection