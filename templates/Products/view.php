<?php



?>

<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Alterar Produto'), ['action' => 'edit', $product->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(
                __('Excluir Produto'),
                ['action' => 'delete', $product->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $product->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Produtos'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
            <?= $this->Html->link(__('Novo produto'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
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
