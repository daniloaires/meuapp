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
            <?= $this->Html->link(__('List Cash Flows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cashFlows form content">
            <?= $this->Form->create($cashFlow) ?>
            <fieldset>
                <legend><?= __('Add Cash Flow') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('valor');
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('forma_pagto');
                    echo $this->Form->control('data');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
