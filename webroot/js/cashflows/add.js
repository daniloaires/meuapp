jQuery(function() {

    // Defina o valor inicial do campo de entrada como vazio
    $('.dinheiro').val('');
    // Aplique a máscara de dinheiro ao campo de entrada
    $('.dinheiro').maskMoney({
        prefix: 'R$ ',
        thousands: '.',
        decimal: ',',
        allowZero: true,
        showSymbol: true
    });   
            
});