jQuery(function() {

    const fileInput = document.getElementById('foto');
    const maxSize = 2 * 1024 * 1024; // 2MB

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];

        // Verificar o formato do arquivo
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            alert('Formato de arquivo inválido. Por favor, envie uma imagem JPEG, PNG ou GIF.');
            fileInput.value = ''; // Limpar o input
            return;
        }

        // Verificar o tamanho do arquivo
        if (file.size > maxSize) {
            alert('O arquivo é muito grande. O tamanho máximo permitido é de 2MB.');
            fileInput.value = ''; // Limpar o input
            return;
        }

        console.log('Arquivo válido. Nome:', file.name, 'Tamanho:', file.size, 'Tipo:', file.type);
    });

    $('#foto').change(function(event){
        var file = event.target.files[0];
        if (file && file.size <= 2 * 1024 * 1024 && file.type.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(file);
        } else {
            alert('Por favor, selecione uma imagem com tamanho máximo de 2MB.');
            $('#foto').val('');
            $('#preview').hide();
        }
    });  

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