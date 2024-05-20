<?php

/**
 * @var \App\View\AppView $this
 */

$this->layout = 'CakeLte.login';
?>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg"><?= __('Informar Usuário e Senha') ?></p>

        <?= $this->Form->create() ?>

        <?= $this->Form->control('username', [
            'label' => false,
            'placeholder' => __('Usuário'),
            'append' => '<i class="fas fa-user"></i>',
        ]) ?>

        <?= $this->Form->control('password', [
            'label' => false,
            'placeholder' => __('Senha'),
            'append' => '<i class="fas fa-lock"></i>',
        ]) ?>

        <div class="row">
            <div class="col-8">

            </div>

            <div class="col-4">
                <?= $this->Form->control(__('Entrar'), ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?= $this->Form->end() ?>

        <p class="mb-1">
            <?= $this->Html->link(__('Esqueci minha senha'), ['controller' => 'Users', 'action' => 'recuperar']) ?>
        </p>
        <p class="mb-0">
            <?= $this->Html->link(__('Criar uma conta'), ['controller' => 'Users', 'action' => 'add']) ?>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>