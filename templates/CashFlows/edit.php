<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CashFlow $cashFlow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cashFlow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cashFlow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cash Flows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="cashFlows form content">
            <?= $this->Form->create($cashFlow) ?>
            <fieldset>
                <legend><?= __('Edit Cash Flow') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('valor');
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('forma_pagto');
                    echo $this->Form->control('data');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Dados'), ['class' => 'btn btn-success float-right']) ?>
            <?= $this->Form->end() ?>
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