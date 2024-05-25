<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $user->id), 'class' => 'btn btn-danger btn-block side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block side-nav-item']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="users form">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Alterar Usuário') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('name', [
                        'class' => 'form-control',
                        'label' => 'Nome',
                        'placeholder' => 'Informe o Nome',
                    ]) ?>
                </div>                
                <div class="form-group">
                    <?= $this->Form->control('username', [
                        'class' => 'form-control',
                        'label' => 'Usuário (login)',
                        'placeholder' => 'Usuário (login)',
                        'autocomplete' => 'new-password'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'label' => 'Senha',
                        'placeholder' => 'Senha de acesso',
                        'autocomplete' => 'new-password'
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
            <?= $this->Form->button(__('Alterar Dados'), ['class' => 'btn btn-success float-right']) ?>
            <?= $this->Form->end() ?><br /></br />
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min') ?>
<!-- inputMask -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min') ?>
<!-- paginaAtual -->
<?= $this->Html->script('users/edit') ?>