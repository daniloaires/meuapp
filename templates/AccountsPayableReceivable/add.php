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
            <?= $this->Html->link(__('List Accounts Payable Receivable'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="accountsPayableReceivable form content">
            <?= $this->Form->create($accountsPayableReceivable) ?>
            <fieldset>
                <legend><?= __('Add Accounts Payable Receivable') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('valor');
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('vencimento');
                    echo $this->Form->control('status');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Dados'), ['class' => 'btn btn-success float-right']) ?>
            <?= $this->Form->end() ?></br /></br />
        </div>
    </div>
</div>
