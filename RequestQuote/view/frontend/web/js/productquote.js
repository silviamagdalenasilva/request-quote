require(['jquery'], function($){
    $(document).ready(function() {
        $('#mprfq-product-addtoquote-button').on('click', function() {
            var productId = $(this).data('product-id');

            $.ajax({
                url: '/request/index/addToQuote',  // Aquí va la URL de tu controlador para agregar el producto a la cotización
                type: 'POST',
                data: { product_id: productId },
                success: function(response) {
                    if(response.success) {
                        alert('Producto agregado a la cotización');
                    } else {
                        alert('Hubo un error al agregar el producto');
                    }
                },
                error: function() {
                    alert('Hubo un error de comunicación');
                }
            });
        });
    });
});
