@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/PedidoAdmin/pedidoAdmin.css')}}">
    <script src="{{asset('js/pedidoAdmin.js')}}"></script>
    <div class="container">
        <div class="row">
            {{-- Parte da esquerda --}}
            <div class="col-md-3">
                <a class="btn btn-primary w-100" href="{{route("admin.dashboard")}}">Voltar</a>
                <div id="list-pedidos" class="list-group my-3 overflow-auto">
                    <a href="#" class="list-group-item list-group-item-action">Pedido 10</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Pedido 9</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Pedido 8</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Pedido 7</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Pedido 6</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Pedido 5</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Pedido 4</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Pedido 3</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Pedido 2</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Pedido 1</a>
                </div>
            </div>
            {{-- Parte do meio --}}
            <div class="col-md-6">
                <h2 class="text-center">Pedido 8</h2>
                {{-- Lista de produtos no pedido --}}
                <div id="list-produtos" class="list-group my-3 overflow-auto">
                    <span class="list-group-item">
                        Pizza - Pepperoni - 1x
                        <span class="class-icons-produto-list">
                            <i class="fa-solid fa-pencil-square"></i> 
                            <i class="fa-solid fa-trash"></i> 
                        </span>
                    </span>
                    <span class="list-group-item"> 
                        Suco - Laranja - 2x
                        <span class="class-icons-produto-list">
                            <i class="fa-solid fa-pencil-square"></i> 
                            <i class="fa-solid fa-trash"></i>
                        </span> 
                    </span>
                    <span class="list-group-item">
                        Cerveja - Skol-Lata - 1x
                        <span class="class-icons-produto-list">
                            <i class="fa-solid fa-pencil-square"></i>
                            <i class="fa-solid fa-trash"></i> 
                        </span> 
                    </span>
                </div>
                {{-- Input group bootstrap --}}
                <div class="input-group my-3">
                    <input type="text" class="form-control" value="Valor total do pedido" readonly>
                    <span class="input-group-text">R$</span>
                    <span class="input-group-text">100,00</span>
                </div>
            </div>
            {{-- Parte da direita --}}
            <div class="col-md-3">
                <select class="form-select my-1">
                    <option value="1">Pizza</option>
                    <option value="2">Suco</option>
                    <option value="3">Cerveja</option>
                </select>
                <select class="form-select my-1">
                    <option value="1">Pepperoni</option>
                    <option value="4">Bacon</option>
                    <option value="5">Quatro Queijos</option>
                </select>
                <input type="number" class="form-control text-end my-1" value="1">
                <a href="#" class="btn btn-secondary w-100">Adicionar Produto</a>
                <select class="form-select my-1">
                    <option value="1">Rua A</option>
                    <option value="2">Rua B</option>
                    <option value="3">Rua C</option>
                </select>
                <a href="#" class="btn btn-warning w-100 my-1">Confirmar Pedido</a>
                <a href="#" class="btn btn-primary w-100 my-1">Imprimir Comandas</a>
                <a href="#" class="btn btn-danger w-100 my-1">Cancelar Pedido</a>
                <a href="#" class="btn btn-success w-100 my-1">Finalizar Pedido</a>
            </div>
        </div>
    </div>
@endsection