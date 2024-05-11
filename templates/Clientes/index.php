<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cliente> $clientes
 */
?>
<div class="clientes index content">
    <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clientes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('rg') ?></th>
                    <th><?= $this->Paginator->sort('cpf') ?></th>
                    <th><?= $this->Paginator->sort('cnpj') ?></th>
                    <th><?= $this->Paginator->sort('inscricao_municipal') ?></th>
                    <th><?= $this->Paginator->sort('inscricao_estadual') ?></th>
                    <th><?= $this->Paginator->sort('telefone_fixo') ?></th>
                    <th><?= $this->Paginator->sort('telefone_celular') ?></th>
                    <th><?= $this->Paginator->sort('telefone_comercial') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                    <td><?= h($cliente->nome) ?></td>
                    <td><?= h($cliente->email) ?></td>
                    <td><?= h($cliente->rg) ?></td>
                    <td><?= h($cliente->cpf) ?></td>
                    <td><?= h($cliente->cnpj) ?></td>
                    <td><?= h($cliente->inscricao_municipal) ?></td>
                    <td><?= h($cliente->inscricao_estadual) ?></td>
                    <td><?= h($cliente->telefone_fixo) ?></td>
                    <td><?= h($cliente->telefone_celular) ?></td>
                    <td><?= h($cliente->telefone_comercial) ?></td>
                    <td><?= h($cliente->created) ?></td>
                    <td><?= h($cliente->modified) ?></td>
                    <td><?= h($cliente->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
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
