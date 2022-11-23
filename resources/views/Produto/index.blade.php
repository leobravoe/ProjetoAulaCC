@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <?php $message = [ "Texto a ser exibido", "warning" ] ?> --}}
        @if (isset($message))
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                <span>{{$message[0]}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a class="btn btn-primary" href="{{route("produto.create")}}">Criar Produto</a>
        <a class="btn btn-primary" href="{{route("admin.dashboard")}}">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <th scope="row">{{$produto->id}}</th>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>
                            <a href="{{route("produto.show", $produto->id)}}" class="btn btn-primary">Mostrar</a>
                            <a href="{{route("produto.edit", $produto->id)}}" class="btn btn-secondary">Editar</a>
                            <a 
                                href="#" 
                                class="btn btn-danger class-button-destroy" 
                                data-bs-toggle="modal" 
                                data-bs-target="#destroyModal"
                                value="{{route("produto.destroy", $produto->id)}}"> 
                                    Remover
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroyModalLabel">Confirmação de remoção</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente remover este recurso?
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger">Confirmar remoção</button> --}}
                    <form id="id-form-modal-botao-remover" action="" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Confirmar remoção">
                    </form>
                    {{-- Route::delete('produto/{id}', "App\Http\Controllers\ProdutoController@destroy")->name("produto.destroy"); --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        const arrayBtnRemover = document.querySelectorAll(".class-button-destroy");
        const formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
        //console.log(arrayBtnRemover);
        arrayBtnRemover.forEach(btnRemover => {
            btnRemover.addEventListener("click", configurarBotaoRemoverModal);
        });
        function configurarBotaoRemoverModal(){
            // Imprimindo o conteudo do atributo value do botão que chamou essa função
            //console.log( this.getAttribute("value") );
            //console.log(formModalBotaoRemover);
            formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
        }
    </script>
@endsection