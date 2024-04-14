$(document).ready(function() {
    // Exibe as mensagens flash com SweetAlert
    $('.sweetalert').each(function() {
        var type = $(this).data('type');
        var message = $(this).text();

        swal.fire({
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 3000 // Fecha automaticamente após 3 segundos
        });
    });
});