@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <?php print_r($tipoProdutos) ?> --}}
        <a class="btn btn-primary" href="{{route("tipoproduto.create")}}">Criar TipoProduto</a>
        <a class="btn btn-primary" href="{{route("admin.dashboard")}}">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoProdutos as $tipoProduto)
                    <tr>
                        <th scope="row">{{$tipoProduto->id}}</th>
                        <td>{{$tipoProduto->descricao}}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Mostrar</a>
                            <a href="#" class="btn btn-secondary">Editar</a>
                            <a href="#" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection