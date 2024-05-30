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
            $('#produto-selecionado').empty();
            $('#produto-selecionado').append(
                ui.item.nome.toUpperCase() + ' :: ' + 
                    ui.item.valor.toLocaleString('pt-BR', { 
                        style: 'currency', currency: 'BRL' }) 
            );
            return false;
        }
    });

    // Evento ao clicar no botão "Adicionar Item"
    $('#add-item').on('click', function(e){
        e.preventDefault();

        var productId = $('#product-id').val();
        var qtde = $('#qtde').val();
        var valor = $('#product-valor').val();
        var orderId = $('#order-id').val();
        var manualEntryAttempted = false; // Flag para evitar loop

        function addItem() {
            if (productId && qtde && valor && orderId && (qtde > 0)) {
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
            } else if (!manualEntryAttempted) {
                manualEntryAttempted = true; // Marcar a tentativa manual para evitar loop
                // Tenta buscar o produto pelo código digitado
                var productCode = $('#product-search').val();
                if (productCode) {
                    $.ajax({
                        url: '/orders/getByCode',
                        type: 'GET',
                        data: {
                            code: productCode
                        },
                        success: function(product) {
                            if (product && product.id) {
                                $('#product-id').val(product.id);
                                $('#product-valor').val(product.valor_venda);
                                addItem(); // Tenta adicionar novamente com os dados preenchidos
                            } else {
                                alert('Produto não encontrado.');
                            }
                        }
                    });
                } else {
                    alert('Por favor, preencha os campos corretamente.');
                }
            }
        }
        addItem();
    });

    $('.delete-item').on('click', function(e){
        e.preventDefault();

        var itemId = $(this).data('id');
        var $row = $(this).closest('tr');

        if (confirm('Tem certeza de que deseja excluir este item?')) {
            $.ajax({
                url: '/orders/deleteOrderItem/' + itemId,
                type: 'DELETE',
                data: {
                    _csrfToken: $('input[name="_csrfToken"]').val(),
                },                
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