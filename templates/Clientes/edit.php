<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cliente->id],
                [
                    'confirm' => __('Are you sure you want to delete # {0}?', $cliente->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('List Clientes'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="clientes form content">
            <?= $this->Form->create($cliente) ?>
            <fieldset class="form-group">
                <legend><?= __('Edit Cliente') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('nome', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('email', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('rg', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('cpf', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('cnpj', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('inscricao_municipal', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('inscricao_estadual', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('telefone_fixo', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('telefone_celular', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('telefone_comercial', ['class' => 'form-control']) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
