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
                    // Verifica se há resultados
                    if (data.length > 0) {
                        // Processa os resultados e os passa para a função de resposta do autocomplete
                        response($.map(data, function(item) {
                            return {
                                label: item.nome + ' (' + item.id + ')',
                                value: item.nome,
                                id: item.id,
                                nome: item.nome,
                                valor: item.valor
                            };
                        }));
                    } else {
                        // Se não houver resultados, mostra uma mensagem ou faz algo apropriado
                        // Aqui, por exemplo, eu limpo a lista de sugestões
                        response([]);
                    }
                }
            });
        },
        select: function(event, ui) {
            // Atualiza os campos com os dados do item selecionado
            $('#product-id').val(ui.item.id);
            $('#product-search').val(ui.item.value);
            $('#product-valor').val(ui.item.valor);
            $('#qtde').val(1);
            $('#produto-selecionado').empty();
            $('#produto-selecionado').append(
                ui.item.nome.toUpperCase() + ' :: ' + 
                    ui.item.valor.toLocaleString('pt-BR', { 
                        style: 'currency', currency: 'BRL' }) 
            );
            return false;
        }
    });

    $('#add-item').on('click', function(e){
        e.preventDefault();
    
        var productId = $('#product-id').val();
        var qtde = $('#qtde').val();
        var valor = $('#product-valor').val();
        var orderId = $('#order-id').val()

        if (productId && qtde && valor && orderId) {
            // Envia a requisição AJAX para adicionar o item
            $.ajax({
                url: '/orders/addOrderItem',
                type: 'POST',
                data: {
                    _csrfToken: $('input[name="_csrfToken"]').val(),
                    order_id: orderId,
                    product_id: productId,
                    qtde: qtde,
                    valor: valor
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Erro ao adicionar item');
                    }
                }
            });
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    });

    $('.delete-item').on('click', function(e){
        var itemId = $(this).data('id');
        var $row = $(this).closest('tr');

        if (confirm('Tem certeza de que deseja excluir este item?')) {
            $.ajax({
                url: '/orders/deleteOrderItem/' + itemId,
                type: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Erro ao excluir item');
                    }
                },
                error: function() {
                    alert('Erro ao excluir item');
                }
            });
        }
    });    

});