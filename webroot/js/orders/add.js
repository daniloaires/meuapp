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
                    response($.map(data, function(item) {
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
            $('#product-valor').val(ui.item.valor); // Certifique-se de adicionar este campo no HTML se precisar usá-lo
            return false;
        }
    });
            
});