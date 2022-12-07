$(document).ready( function() {
    function updatePedidos(){
        $.ajax({
            type: "GET",
            url: `/pedido/admin/getpedidos/`,
            data: null,
            dataType: "json",
            success: function(response){
                console.log(response);
                // IMPLEMENTAR O Método para imprimir os pedidos no local correto
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // Chama a função inicialmente quando carregar a página
    updatePedidos();
});