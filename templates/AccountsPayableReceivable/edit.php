<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountsPayableReceivable $accountsPayableReceivable
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountsPayableReceivable->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountsPayableReceivable->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Accounts Payable Receivable'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountsPayableReceivable form content">
            <?= $this->Form->create($accountsPayableReceivable) ?>
            <fieldset>
                <legend><?= __('Edit Accounts Payable Receivable') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('valor');
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('vencimento');
                    echo $this->Form->control('status');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
