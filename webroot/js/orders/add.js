jQuery(function() {

    // Função de autocomplete para o campo de busca de produtos
    $('#product-search').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '/orders/autocomplete',
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response($.map(data.result, function(item) {
                        return {
                            label: item.nome + ' (' + item.id + ')',
                            value: item.nome,
                            id: item.id,
                            valor: item.valor
                        };
                    }));
                }
            });
        },
        select: function(event, ui) {
            $('#product-id').val(ui.item.id);
            $('#product-search').val(ui.item.value);
            $('#product-valor').val(ui.item.valor);
            return false;
        }
    });

    // Evento ao clicar no botão "Adicionar Item"
    $('#add-item').on('click', function(e){
        e.preventDefault();

        // Coleta os dados do formulário
        var productId = $('#product-id').val();
        var qtde = $('#qtde').val();
        var valor = $('#product-valor').val();

        if (productId && qtde && valor) {
            var total = qtde * valor;

            // Envia a requisição AJAX para adicionar o item
            $.ajax({
                url: '/orders/addOrderItem',  // URL direta
                type: 'POST',
                data: {
                    //order_id: <?= $order->id ?>,  // Passa o order_id diretamente
                    product_id: productId,
                    qtde: qtde,
                    valor: total
                },
                success: function(response) {
                    if (response.success) {
                        // Adiciona o novo item na tabela
                        $('#order-items-table').append(
                            '<tr>' +
                            '<td>' + response.orderItem.id + '</td>' +
                            '<td>' + response.orderItem.product_id + '</td>' +
                            '<td>' + response.orderItem.qtde + '</td>' +
                            '<td>' + response.orderItem.valor + '</td>' +
                            '</tr>'
                        );

                        // Limpa os campos do formulário
                        $('#product-id').val('');
                        $('#product-search').val('');
                        $('#qtde').val('');
                    } else {
                        alert('Erro ao adicionar item');
                    }
                }
            });
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    });
            
});