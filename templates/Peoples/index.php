<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\People> $peoples
 */
?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="peoples index content">
    <?= $this->Html->link(__('Nova Pessoa'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pessoas') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('email_sec') ?></th>
                    <th><?= $this->Paginator->sort('email_terc') ?></th>
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
                <?php foreach ($peoples as $people): ?>
                <tr>
                    <td><?= $this->Number->format($people->id) ?></td>
                    <td><?= $this->Number->format($people->tipo) ?></td>
                    <td><?= h($people->nome) ?></td>
                    <td><?= h($people->email) ?></td>
                    <td><?= h($people->email_sec) ?></td>
                    <td><?= h($people->email_terc) ?></td>
                    <td><?= h($people->rg) ?></td>
                    <td><?= h($people->cpf) ?></td>
                    <td><?= h($people->cnpj) ?></td>
                    <td><?= h($people->inscricao_municipal) ?></td>
                    <td><?= h($people->inscricao_estadual) ?></td>
                    <td><?= h($people->telefone_fixo) ?></td>
                    <td><?= h($people->telefone_celular) ?></td>
                    <td><?= h($people->telefone_comercial) ?></td>
                    <td><?= h($people->created) ?></td>
                    <td><?= h($people->modified) ?></td>
                    <td><?= h($people->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            '<i class="ti-eye"></i> ', 
                            ['action' => 'view', $people->id],
                            ['escape' => false] 
                        ) ?>
                    
                        <?= $this->Html->link(
                            '<i class="ti-pencil"></i> ', 
                            ['action' => 'edit', $people->id],
                            ['escape' => false] 
                        ) ?>

                        <?= $this->Form->postLink(
                            '<i class="ti-trash"></i> ', 
                            ['action' => 'delete', $people->id],
                            ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $people->id), 'escapeTitle' => false, 'escape' => false]
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
