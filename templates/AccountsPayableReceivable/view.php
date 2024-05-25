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
            <?= $this->Html->link(__('Edit Accounts Payable Receivable'), ['action' => 'edit', $accountsPayableReceivable->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Accounts Payable Receivable'), ['action' => 'delete', $accountsPayableReceivable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountsPayableReceivable->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Accounts Payable Receivable'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Accounts Payable Receivable'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountsPayableReceivable view content">
            <h3><?= h($accountsPayableReceivable->descricao) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($accountsPayableReceivable->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($accountsPayableReceivable->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($accountsPayableReceivable->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= $this->Number->format($accountsPayableReceivable->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($accountsPayableReceivable->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vencimento') ?></th>
                    <td><?= h($accountsPayableReceivable->vencimento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($accountsPayableReceivable->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($accountsPayableReceivable->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($accountsPayableReceivable->deleted) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
