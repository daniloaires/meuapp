<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Role> $roles
 */
?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="roles index content">
    <?= $this->Html->link(__('Novo Grupo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Listar Grupos de Usuário') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('Nome do Grupo') ?></th>
                    <th><?= $this->Paginator->sort('Criado em') ?></th>
                    <th><?= $this->Paginator->sort('Modificado em') ?></th>
                    <th class="actions"><?= __('Ações') .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= $this->Number->format($role->id) ?></td>
                    <td><?= h($role->name) ?></td>
                    <td><?= h($role->created->format('d/m/Y H:i:s')) ?></td>
                    <td><?= h($role->modified->format('d/m/Y H:i:s')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            '<i class="ti-eye"></i> ', 
                            ['action' => 'view', $role->id],
                            ['escape' => false] 
                        ) ?>
                    
                        <?= $this->Html->link(
                            '<i class="ti-pencil"></i> ', 
                            ['action' => 'edit', $role->id],
                            ['escape' => false] 
                        ) ?>

                        <?= $this->Form->postLink(
                            '<i class="ti-trash"></i> ', // Ícone Themify de trait e o texto 'Delete'
                            ['action' => 'delete', $role->id],
                            ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $role->id), 'escapeTitle' => false, 'escape' => false]
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
