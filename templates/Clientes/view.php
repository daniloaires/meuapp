<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(
                __('Delete Cliente'),
                ['action' => 'delete', $cliente->id],
                [
                    'confirm' => __('Are you sure you want to delete # {0}?', $cliente->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('List Clientes'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary btn-block mb-2']) ?>
            <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="clientes view content">
            <h3><?= h($cliente->nome) ?></h3>
            <table class="table table-striped table-bordered">
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cliente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($cliente->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rg') ?></th>
                    <td><?= h($cliente->rg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($cliente->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cnpj') ?></th>
                    <td><?= h($cliente->cnpj) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inscricao Municipal') ?></th>
                    <td><?= h($cliente->inscricao_municipal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inscricao Estadual') ?></th>
                    <td><?= h($cliente->inscricao_estadual) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone Fixo') ?></th>
                    <td><?= h($cliente->telefone_fixo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone Celular') ?></th>
                    <td><?= h($cliente->telefone_celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone Comercial') ?></th>
                    <td><?= h($cliente->telefone_comercial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cliente->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($cliente->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($cliente->deleted) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
