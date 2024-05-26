<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($product->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($product->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Foto') ?></th>
                    <td><?= h($product->foto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Compra') ?></th>
                    <td><?= $this->Number->format($product->valor_compra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Venda') ?></th>
                    <td><?= $this->Number->format($product->valor_venda) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Locacao') ?></th>
                    <td><?= $this->Number->format($product->valor_locacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estoque Min') ?></th>
                    <td><?= $this->Number->format($product->estoque_min) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estoque') ?></th>
                    <td><?= $this->Number->format($product->estoque) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unidade') ?></th>
                    <td><?= $this->Number->format($product->unidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($product->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($product->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($product->deleted) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->descricao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
