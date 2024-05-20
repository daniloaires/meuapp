<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="users form">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Adicionar Usuário') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('username', [
                        'class' => 'form-control',
                        'label' => 'Usuário',
                        'placeholder' => 'Nome de usuário',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'label' => 'Senha',
                        'placeholder' => 'Senha de acesso',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('role_id', [
                        'options' => $roles, 
                        'class' => 'form-control',
                        'label' => 'Grupo',
                        'placeholder' => 'Grupo de usuário',
                    ]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Cadastrar'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

