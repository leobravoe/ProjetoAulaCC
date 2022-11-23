@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="#" class="btn btn-primary">Gerenciar Pedidos</a>
                    <a href="{{route("endereco.index")}}"" class="btn btn-primary">Gerenciar Enderecos</a>
                    <a href="{{route("userinfo.create")}}" class="btn btn-primary">Gerenciar Informações Adicionais</a>
                    <a href="/" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
