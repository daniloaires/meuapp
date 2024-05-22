<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sector> $sectors
 */
?>
<div class="sectors index content">
    <?= $this->Html->link(__('New Sector'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sectors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sectors as $sector): ?>
                <tr>
                    <td><?= $this->Number->format($sector->id) ?></td>
                    <td><?= h($sector->name) ?></td>
                    <td><?= h($sector->created) ?></td>
                    <td><?= h($sector->modified) ?></td>
                    <td><?= h($sector->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sector->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sector->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id)]) ?>
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
