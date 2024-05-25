<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CashFlow $cashFlow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cash Flow'), ['action' => 'edit', $cashFlow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cash Flow'), ['action' => 'delete', $cashFlow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cashFlow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cash Flows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cash Flow'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
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
