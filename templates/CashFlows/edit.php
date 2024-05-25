<?php

use App\Model\Entity\CashFlow;

?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir Entrada/Saída'),
                ['action' => 'delete', $cashFlow->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $cashFlow->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Entradas/Saídas'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="cashFlows form content">
            <?= $this->Form->create($cashFlow) ?>
            <fieldset>
                <legend><?= __('Adicionar Entrada/Saída') ?></legend>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control('tipo', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Tipo',
                            'empty' => 'Selecione',
                            'options' => CashFlow::LIST_TIPO_CAIXA_STR,
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('descricao', [
                            'class' => 'form-control',
                            'label' => 'Descrição',
                            'placeholder' => 'Informe a descrição',
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control('valor', [
                            'class' => 'form-control dinheiro',
                            'type' => 'text',
                            'label' => 'Valor',
                            'placeholder' => 'Informe o valor',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('data', [
                            'class' => 'form-control',
                            'label' => 'Data',
                            'placeholder' => 'Informe a data',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('forma_pagto', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Forma de pagamento',
                            'empty' => 'Selecione',
                            'options' => CashFlow::LIST_FORMA_PAGTO_STR,
                        ]) ?>
                    </div>
                </div>
                </fieldset>
            <?= $this->Form->button(__('Alterar Dados'), ['class' => 'btn btn-success float-right']) ?>
            <?= $this->Form->end() ?><br /></br />
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min') ?>
<!-- maskMoney -->
<?= $this->Html->script('../js/maskmoney.min.js') ?>
<!-- inputMask -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min') ?>
<!-- paginaAtual -->
<?= $this->Html->script('cashflows/edit') ?>