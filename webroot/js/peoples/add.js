jQuery(function() {

    $('.cel').inputmask('(99) 99999-9999');
    $('.tel').inputmask('(99) 9999-9999');
    $('.cpf').inputmask('999.999.999-99', { clearIncomplete: true });
    $('.cnpj').inputmask('99.999.999/9999-99', { clearIncomplete: true });

    // Aplicar máscara ao campo CEP
    $('.cep').mask('00000-000');

    // Função para buscar endereço a partir do CEP
    $('.cep').on('blur', function() {
        var cep = $(this).val().replace(/\D/g, '');

        if (cep !== "") {
            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {
                // Preencher os campos com "..." enquanto consulta o webservice
                $('.logradouro').val('...');
                $('.bairro').val('...');
                $('.cidade').val('...');
                $('.uf').val('...');

                // Consulta o webservice ViaCEP
                $.ajax({
                    url: `https://viacep.com.br/ws/${cep}/json/`,
                    dataType: 'json',
                    success: function(data) {
                        if (!("erro" in data)) {
                            // Atualizar os campos com os valores retornados
                            $('.logradouro').val(data.logradouro);
                            $('.bairro').val(data.bairro);
                            $('.cidade').val(data.localidade);
                            $('.uf').val(data.uf);
                        } else {
                            // CEP não encontrado
                            alert("CEP não encontrado.");
                            clearAddressFields();
                        }
                    },
                    error: function() {
                        alert("Erro ao consultar o serviço de CEP.");
                        clearAddressFields();
                    }
                });
            } else {
                alert("Formato de CEP inválido.");
                clearAddressFields();
            }
        } else {
            clearAddressFields();
        }
    });

    function clearAddressFields() {
        $('.logradouro').val('');
        $('.bairro').val('');
        $('.cidade').val('');
        $('.uf').val('');
    }    

});