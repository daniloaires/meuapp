jQuery(function() {

    Dropzone.options.myDropzone = {
        paramName: 'foto', // O nome do parâmetro que será enviado
        maxFilesize: 2, // Tamanho máximo do arquivo em MB
        acceptedFiles: 'image/*', // Aceitar apenas imagens
        init: function() {
            this.on('success', function(file, response) {
                console.log('Upload bem-sucedido', response);
            });
            this.on('error', function(file, response) {
                console.log('Erro no upload', response);
            });
        }
    }; 

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