<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
  setTimeout(function () {
        Swal.fire({
            title: "<?= __('Erro!') ?>",
            icon: 'error',
            html: '<?= html_entity_decode($message) ?>',
            showCloseButton: false,
            allowOutsideClick: true,
            heightAuto: false,
            confirmButtonText:
                'Ok',
        });
    }, 200);
</script>