jQuery(function() {

    // Função de autocomplete para o campo de busca de produtos
    $('#product-search').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '/products/autocomplete',
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
        var manualEntryAttempted = false;

        function addItem() {
            if (productId && qtde && valor && orderId && (qtde > 0)) {
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
                manualEntryAttempted = true;
                var productCode = $('#product-search').val();
                if (productCode) {
                    $.ajax({
                        url: '/products/getByCode',
                        type: 'GET',
                        data: {
                            code: productCode
                        },
                        success: function(product) {
                            if (product && product.id) {
                                $('#produto-selecionado').empty();
                                $('#produto-selecionado').append(
                                    product.nome.toUpperCase() + ' :: ' + 
                                        product.valor_venda.toLocaleString('pt-BR', { 
                                            style: 'currency', currency: 'BRL' }) 
                                );
                                $('#product-id').val(product.id);
                                $('#product-valor').val(product.valor_venda);
                                addItem();
                            } else {
                                $('#produto-selecionado').empty();
                                $('#produto-selecionado').append('Produto não encontrado');
                            }
                        }
                    });
                } else {
                    alert('Por favor, preencha os campos corretamente.');
                }
            } else {
                //alert('Por favor, preencha os campos corretamente.');
            }
        }
        addItem();
    });

    $('.delete-item').on('click', function(e){
        e.preventDefault();

        let itemId = $(this).data('id');

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

    // Evento ao clicar no botão "Finalizar Pedido"
    $('#fechar-pedido').on('click', function(e) {
        e.preventDefault();

        let orderId = $('#order-id').val();
        let valor = $(this).data('valor');
        let tipo = 1;

        if (valor === 0) {
            alert('Impossível finalizar um pedido vazio!');
            return;
        }

        // Abre o modal para selecionar a forma de pagamento
        $('#paymentModal').modal('show');

        // Evento ao clicar no botão "Confirmar Pagamento" no modal
        $('#confirm-payment').on('click', function() {
            let forma_pagto = $('#forma-pagto').val();

            $.ajax({
                url: '/orders/finalizarPedido',
                type: 'POST',
                data: {
                    _csrfToken: $('input[name="_csrfToken"]').val(),
                    orderId: orderId,
                    valor: valor,
                    tipo: tipo,
                    forma_pagto: forma_pagto
                },
                success: function(response) {
                    if (response.success) {
                        alert('Pedido finalizado com sucesso');
                        location.reload();
                    } else {
                        alert('Não foi possível finalizar');
                    }
                },
                error: function() {
                    alert('Erro ao finalizar o pedido');
                }
            });

            // Fecha o modal após a confirmação
            $('#paymentModal').modal('hide');
        });
    });

});