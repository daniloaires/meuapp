<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayRecAccount $payRecAccount
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payRecAccount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payRecAccount->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pay Rec Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payRecAccounts form content">
            <?= $this->Form->create($payRecAccount) ?>
            <fieldset>
                <legend><?= __('Edit Pay Rec Account') ?></legend>
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
