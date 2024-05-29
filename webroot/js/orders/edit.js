jQuery(function() {

    $('.valor').inputmask('currency', { 
        prefix: 'R$ ', 
        groupSeparator: '.', 
        radixPoint: ',', 
        allowMinus: false,
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        rightAlign: false,
        clearIncomplete: true
    });    
            
});