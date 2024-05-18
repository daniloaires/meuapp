<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cliente> $clientes
 */
?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="clientes index content">
    <?= $this->Html->link(__('Novo Cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Listar Clientes') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
                    <th class="actions"><?= __('Ações') .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?></th>
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
                    <td class="actions">
                        <?= $this->Html->link(
                            '<i class="ti-eye"></i> ', 
                            ['action' => 'view', $cliente->id],
                            ['escape' => false] 
                        ) ?>
                    
                        <?= $this->Html->link(
                            '<i class="ti-pencil"></i> ', 
                            ['action' => 'edit', $cliente->id],
                            ['escape' => false] 
                        ) ?>

                        <?= $this->Form->postLink(
                            '<i class="ti-trash"></i> ', // Ícone Themify de trait e o texto 'Delete'
                            ['action' => 'delete', $cliente->id],
                            ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $cliente->id), 'escapeTitle' => false, 'escape' => false]
                        ) ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>
