@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="#" class="btn btn-primary">Gerenciar Pedidos</a>
                    <a href="{{route("produto.index")}}" class="btn btn-primary">Gerenciar Produtos</a>
                    <a href="{{route("tipoproduto.index")}}" class="btn btn-primary">Gerenciar Tipo de Produtos</a>
                    <a href="/" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
