<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir Grupo'),
                ['action' => 'delete', $role->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $role->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Grupos'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="roles form content">
            <?= $this->Form->create($role) ?>
            <fieldset class="form-group">
                <legend><?= __('Alterar Grupo') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('name', [
                        'class' => 'form-control',
                        'label' => 'Nome',
                        'placeholder' => 'Nome do Grupo',
                    ]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Alterar'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min') ?>
<!-- inputMask -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min') ?>
<!-- paginaAtual -->
<?= $this->Html->script('peoples/edit') ?>