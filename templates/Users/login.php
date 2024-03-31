<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Por favor, informe seu usuário e senha') ?></legend>
    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('password') ?>
</fieldset>
<div class="text-center">
<?= $this->Form->button(__('Login')); ?>
</div>
<?= $this->Form->end() ?>