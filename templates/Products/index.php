<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class="products index content">
    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('valor_compra') ?></th>
                    <th><?= $this->Paginator->sort('valor_venda') ?></th>
                    <th><?= $this->Paginator->sort('valor_locacao') ?></th>
                    <th><?= $this->Paginator->sort('estoque_min') ?></th>
                    <th><?= $this->Paginator->sort('estoque') ?></th>
                    <th><?= $this->Paginator->sort('unidade') ?></th>
                    <th><?= $this->Paginator->sort('foto') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->nome) ?></td>
                    <td><?= $this->Number->format($product->valor_compra) ?></td>
                    <td><?= $this->Number->format($product->valor_venda) ?></td>
                    <td><?= $this->Number->format($product->valor_locacao) ?></td>
                    <td><?= $this->Number->format($product->estoque_min) ?></td>
                    <td><?= $this->Number->format($product->estoque) ?></td>
                    <td><?= $this->Number->format($product->unidade) ?></td>
                    <td><?= h($product->foto) ?></td>
                    <td><?= h($product->created) ?></td>
                    <td><?= h($product->modified) ?></td>
                    <td><?= h($product->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
