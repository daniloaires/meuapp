<?php



?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="row">
    <aside class="col-md-2">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Alterar Grupo'), ['action' => 'edit', $role->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(
                __('Excluir Grupo'),
                ['action' => 'delete', $role->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $role->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Grupos'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
            <?= $this->Html->link(__('Novo Grupo'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-10">
        <div class="roles view content">
            <h3><?= h($role->name) ?></h3>
            <table class="table table-striped">
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($role->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado em') ?></th>
                    <td><?= h($role->created->format('d/m/Y H:i:s')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= (!empty($role->modified)) ? h($role->modified->format('d/m/Y H:i:s')) : '' ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Usuários Relacionados') ?></h4>
                <?php if (!empty($role->users)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('ID') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Usuário') ?></th>
                            <th><?= __('Grupo') ?></th>
                            <th><?= __('Criado em') ?></th>
                            <th><?= __('Modificado em') ?></th>
                            <th class="actions"><?= __('Ações' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp') ?></th>
                        </tr>
                        <?php foreach ($role->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->name) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= h($users->role_id) ?></td>
                            <td><?= h($users->created->format('d/m/Y H:i:s')) ?></td>
                            <td><?= (!empty($users->modified)) ? h($users->modified->format('d/m/Y H:i:s')) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(
                                    '<i class="ti-eye"></i> ', 
                                    ['action' => 'view', $users->id],
                                    ['escape' => false] 
                                ) ?>
                            
                                <?= $this->Html->link(
                                    '<i class="ti-pencil"></i> ', 
                                    ['action' => 'edit', $users->id],
                                    ['escape' => false] 
                                ) ?>

                                <?= $this->Form->postLink(
                                    '<i class="ti-trash"></i> ',
                                    ['action' => 'delete', $users->id],
                                    ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $users->id), 'escapeTitle' => false, 'escape' => false]
                                ) ?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
