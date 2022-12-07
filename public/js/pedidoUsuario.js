// Faz interior dessa função ser executado apenas após toda página HTML
// estiver carregada
$(document).ready( function() {
    // busco o elemento select no HTML
    const selectFiltroTipo = $("#id-select-filtro-tipo");
    selectFiltroTipo.on("change", function() {
        updateProdutos();
    });

    function groupBy(arr, property){
        return arr.reduce( function (anterior, atual){
            if(!anterior[atual[property]]){
                anterior[atual[property]] = [];
            }
            anterior[atual[property]].push(atual);
            return anterior;
        }, [] );
    }

    function showUpdatedProdutos(produtos_group){
        // Procuro onde irei imprimir as informações
        divListProdutos = $("#id-div-lista-produtos");
        // Limpa tudo que tenha dentro da div
        divListProdutos.html("");
        produtos_group.forEach(produtos_tipo => {
            // Imprimir inforções do tipo
            divListProdutos.append(`
                <div class="my-4 border border-dark">
                    <div class="m-4">
                        <h4 class="d-inline">${produtos_tipo[0].descricao}</h4>
                        <select class="float-end">
                            <option value="">Ordem do sistema</option>
                            <option value="">Menor para maior</option>
                            <option value="">Maior para menor</option>
                        </select>
                    </div>
                    <div class="my-4 produto">
                    </div>
                </div>
            `);
            produtos_tipo.forEach(produto => {
                // Imprimir as informação da variável produto
                $(".my-4.produto:last").append(`
                    <div class="row m-3 border border-dark">
                        <div class="col-md-3 my-auto">
                            <img class="w-100 h-100" src="${produto.urlImage}">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h5>${produto.nome}</h5>
                            <h6>Ingredientes:</h6>
                            <p>${produto.ingredientes}</p>
                        </div>
                        <div class="col-md-3 my-auto">
                            <div class="my-3">
                                <input type="text" class="form-control" value="R$ ${produto.preco}" readonly>
                            </div>
                            <div class="my-3">
                                <input type="number" class="form-control" id="id-quant-produto-${produto.id}" value="1">
                            </div>
                            <div class="my-3">
                                <a class="btn btn-primary w-100 btn-add-produto" value="${produto.id}" value-tipo="${produto.Tipo_Produtos_id}">Adicionar Produto</a>
                            </div>
                        </div>
                    </div>
                `);
            });
        });
    }

    function updateProdutos(){
        // Pego o campo value de dentro do elemento selectFiltroTipo
        const tipoProdutoId = selectFiltroTipo.val();
        $.ajax({
            type: "GET",
            url: `/pedido/usuario/getprodutos/${tipoProdutoId}`,
            data: null,
            dataType: "json",
            success: function(response){
                // Criando o produtos_group de forma global
                produtos_group = groupBy(response.return, "Tipo_Produtos_id")
                showUpdatedProdutos(produtos_group);
            },
            error: function(error){
                console.log("Erro");
                console.log(error);
            }
        });
    }

    // roda pela primeira vez o método updateProdutos
    updateProdutos();
});
