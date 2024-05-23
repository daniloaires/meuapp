jQuery(function() {

    $('.cel').inputmask('(99) 99999-9999');
    $('.tel').inputmask('(99) 9999-9999');
    $('.cpf').inputmask('999.999.999-99', { clearIncomplete: true });
    $('.cnpj').inputmask('99.999.999/9999-99', { clearIncomplete: true });
    $('.cep').inputmask('99999-999', { clearIncomplete: true });

});