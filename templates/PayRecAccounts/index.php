<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PayRecAccount> $payRecAccounts
 */
?>
<div class="payRecAccounts index content">
    <?= $this->Html->link(__('New Pay Rec Account'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pay Rec Accounts') ?></h3>
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
                <?php foreach ($payRecAccounts as $payRecAccount): ?>
                <tr>
                    <td><?= $this->Number->format($payRecAccount->id) ?></td>
                    <td><?= h($payRecAccount->descricao) ?></td>
                    <td><?= $this->Number->format($payRecAccount->valor) ?></td>
                    <td><?= $this->Number->format($payRecAccount->tipo) ?></td>
                    <td><?= h($payRecAccount->vencimento) ?></td>
                    <td><?= $this->Number->format($payRecAccount->status) ?></td>
                    <td><?= h($payRecAccount->created) ?></td>
                    <td><?= h($payRecAccount->modified) ?></td>
                    <td><?= h($payRecAccount->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payRecAccount->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payRecAccount->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payRecAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payRecAccount->id)]) ?>
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
