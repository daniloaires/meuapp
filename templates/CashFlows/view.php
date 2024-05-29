<?php



?>

<div class="row">
    <aside class="col-md-2">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Alterar Entradas/Saídas'), ['action' => 'edit', $cashFlow->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(
                __('Excluir Entrada/Saída'),
                ['action' => 'delete', $cashFlow->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $cashFlow->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Entradas/Saídas'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
            <?= $this->Html->link(__('Nova Entrada/Saída'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-10">
        <div class="cashFlows view content">
            <h3><?= h($cashFlow->descricao) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($cashFlow->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cashFlow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($cashFlow->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= $this->Number->format($cashFlow->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Forma Pagto') ?></th>
                    <td><?= $this->Number->format($cashFlow->forma_pagto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data') ?></th>
                    <td><?= h($cashFlow->data) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cashFlow->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($cashFlow->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($cashFlow->deleted) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
