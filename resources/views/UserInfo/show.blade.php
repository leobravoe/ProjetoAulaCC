<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show userinfo</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        @if (isset($message))
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                <span>{{$message[0]}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{route("userinfo.edit", $userInfo->Users_id)}}" class="btn btn-secondary">Editar</a>
        <a 
            href="#" 
            class="btn btn-danger class-button-destroy" 
            data-bs-toggle="modal" 
            data-bs-target="#destroyModal"
            value="{{route("userinfo.destroy", $userInfo->Users_id)}}"> 
                Remover
        </a>
        <div class="form-group">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" value="{{$userInfo->Users_id}}" disabled>
            <div id="id" class="form-text">Não será necessário cadastrar um id</div>
        </div>
        <div class="form-group">
            <label for="id-input-profileImg" class="form-label">Profile Img</label>
            <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="Digite o profileImg" value="{{$userInfo->profileImg}}" disabled>
        </div>
        <div class="form-group">
            <label for="id-input-status" class="form-label">Status</label>
            <input type="text" class="form-control" id="id-input-status" placeholder="#" value="{{$userInfo->status}}" disabled>
        </div>
        <div class="form-group">
            <label for="id-input-dataNasc" class="form-label">dataNasc</label>
            <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="Digite os dataNasc" value="{{$userInfo->dataNasc}}" disabled>
        </div>
        <div class="form-group">
            <label for="id-input-genero" class="form-label">Genero</label>
            <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="Digite a genero" value="{{$userInfo->genero}}" disabled>
        </div>
        <div class="form-group">
            <label for="id-input-updated_at" class="form-label">updated_at</label>
            <input name="updated_at" type="text" class="form-control" id="id-input-updated_at" placeholder="Digite a updated_at" value="{{$userInfo->updated_at}}" disabled>
        </div>
        <div class="form-group">
            <label for="id-input-created_at" class="form-label">created_at</label>
            <input name="created_at" type="text" class="form-control" id="id-input-created_at" placeholder="Digite a created_at" value="{{$userInfo->created_at}}" disabled>
        </div>
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
</body>
</html>