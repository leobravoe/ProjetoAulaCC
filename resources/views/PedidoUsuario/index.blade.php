@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/pedidoUsuario.js') }}"></script> 
    <div class="container">
        {{-- Parte superior --}}
        <div>
            <h1 class="text-center">Faça seu Pedido</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Filtro de nome de produto">
                        <div class="input-group-append">
                            <button id="id-button-busca" class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <select id="id-select-filtro-tipo" class="form-select">
                        <option value="0">Tudo</option>
                        <option value="1">Pizza</option>
                        <option value="2">Suco</option>
                        <option value="3">Cerveja</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Parte do meio --}}
        <div id="id-div-lista-produtos"></div>

        {{-- Itens do Pedido --}}
        <div class="my-4 border border-dark">
            <div class="m-3">
                <h4>Itens do pedido</h4>
            </div>
            <div class="m-3">
                <table class="table text-center">
                    <tbody id="id-tbody-itens-pedido">
                    </tbody>
                </table>
            </div>
            <div class="m-3">
                <a class="btn btn-primary w-100" href="#">Próximo</a>
            </div>
        </div>
    </div>
@endsection