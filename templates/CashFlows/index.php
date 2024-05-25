<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CashFlow> $cashFlows
 */
?>
<div class="cashFlows index content">
    <?= $this->Html->link(__('New Cash Flow'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cash Flows') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('forma_pagto') ?></th>
                    <th><?= $this->Paginator->sort('data') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cashFlows as $cashFlow): ?>
                <tr>
                    <td><?= $this->Number->format($cashFlow->id) ?></td>
                    <td><?= h($cashFlow->descricao) ?></td>
                    <td><?= $this->Number->format($cashFlow->valor) ?></td>
                    <td><?= $this->Number->format($cashFlow->tipo) ?></td>
                    <td><?= $this->Number->format($cashFlow->forma_pagto) ?></td>
                    <td><?= h($cashFlow->data) ?></td>
                    <td><?= h($cashFlow->created) ?></td>
                    <td><?= h($cashFlow->modified) ?></td>
                    <td><?= h($cashFlow->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cashFlow->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cashFlow->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cashFlow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cashFlow->id)]) ?>
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
