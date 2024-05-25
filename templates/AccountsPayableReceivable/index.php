<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AccountsPayableReceivable> $accountsPayableReceivable
 */
?>
<div class="accountsPayableReceivable index content">
    <?= $this->Html->link(__('New Accounts Payable Receivable'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Accounts Payable Receivable') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('vencimento') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accountsPayableReceivable as $accountsPayableReceivable): ?>
                <tr>
                    <td><?= $this->Number->format($accountsPayableReceivable->id) ?></td>
                    <td><?= h($accountsPayableReceivable->descricao) ?></td>
                    <td><?= $this->Number->format($accountsPayableReceivable->valor) ?></td>
                    <td><?= $this->Number->format($accountsPayableReceivable->tipo) ?></td>
                    <td><?= h($accountsPayableReceivable->vencimento) ?></td>
                    <td><?= $this->Number->format($accountsPayableReceivable->status) ?></td>
                    <td><?= h($accountsPayableReceivable->created) ?></td>
                    <td><?= h($accountsPayableReceivable->modified) ?></td>
                    <td><?= h($accountsPayableReceivable->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $accountsPayableReceivable->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountsPayableReceivable->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountsPayableReceivable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountsPayableReceivable->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
