// Faz interior dessa função ser executado apenas após toda página HTML
// estiver carregada
$(document).ready( function() {
    // busco o elemento select no HTML
    const selectFiltroTipo = $("#id-select-filtro-tipo");
    selectFiltroTipo.on("change", function() {
        updateProdutos();
    });

    function updateProdutos(){
        // Pego o campo value de dentro do elemento selectFiltroTipo
        const tipoProdutoId = selectFiltroTipo.val();
        $.ajax({
            type: "GET",
            url: `/pedido/usuario/getprodutos/${tipoProdutoId}`,
            data: null,
            dataType: "json",
            success: function(response){
                console.log(response);
            },
            error: function(error){
                console.log(error);
            }
        });
    }
});