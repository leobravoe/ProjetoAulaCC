@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- <?php $message = ["Mensagem a ser exibida", "danger"] ?> --}}

        @if (isset($message))
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                <span>{{$message[0]}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <a class="btn btn-primary" href="{{route("endereco.create")}}">Criar Enderço</a>
        <a class="btn btn-primary" href="{{route("home")}}">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Número</th>
                    <th scope="col">Complemento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enderecos as $endereco)
                    <tr>
                        <th scope="row">{{$endereco->id}}</th>
                        <td>{{$endereco->bairro}}</td>
                        <td>{{$endereco->logradouro}}</td>
                        <td>{{$endereco->numero}}</td>
                        <td>{{$endereco->complemento}}</td>
                        <td>
                            <a href="{{route("endereco.show", $endereco->id)}}" class="btn btn-primary">Mostrar</a>
                            <a href="{{route("endereco.edit", $endereco->id)}}" class="btn btn-secondary">Editar</a>
                            <a href="#" 
                               class="btn btn-danger class-button-destroy" 
                               data-bs-toggle="modal" 
                               data-bs-target="#id-modal-destroy"
                               value="{{route("endereco.destroy", $endereco->id)}}">
                                    Remover
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="id-modal-destroy" tabindex="-1" aria-labelledby="id-label-modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="id-label-modal-title">Remover recurso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente remover este recurso?</p>
                </div>
                <div class="modal-footer">
                    <form id="id-form-destroy" method="POST" action="" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirmar remoção</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Buscando na minha tela, todos os elementos que possuem a classe "class-button-destroy"
        const arrayBtnDestroy = document.querySelectorAll(".class-button-destroy");
        // Busco o form que está dentro do modal
        const formDestroy = document.querySelector("#id-form-destroy");
        // Para todos os elementos dentro do array, irei adicionar evento e click neles
        arrayBtnDestroy.forEach(btnDestroy => {
            // Adiciona o evento de click
            btnDestroy.addEventListener('click', btnDestroyFunction);
        });
        function btnDestroyFunction (){
            // Imprimo no console qual é o value do botão que chamou essa função
            //console.log(this.getAttribute("value"));
            // Configuro o atributo "action" do elemento form com o valor do campo 
            //    escondido "value" do botão que chamou essa função.
            formDestroy.setAttribute("action", this.getAttribute("value"));
        }
    </script>
@endsection