<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="users index content">
    <?= $this->Html->link(__('Novo Usuário'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Listar Usuários') ?></h3>
    
    <!-- Search Form -->
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
            <legend><?= __('Pesquisar') ?></legend>
            <div class="row">
                <div class="col-md-7">
                    <?= $this->Form->control('name', [
                        'label' => 'Nome', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('name')
                    ]) ?>
                </div>
                <div class="col-md-5">
                    <?= $this->Form->control('username', [
                        'label' => 'Usuário (login)', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('username')
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('created_from', [
                        'label' => 'Criado a partir de', 
                        'type' => 'date', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('created_from')
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('created_to', [
                        'label' => 'Criado até', 
                        'type' => 'date', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('created_to')
                    ]) ?>
                </div>
            </div>
        </fieldset>
        <?= $this->Form->button(__('Pesquisar'), ['class' => 'btn btn-info']) ?>        
        <?= $this->Form->end() ?><hr />
    </div>    

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class='nowrap'><?= $this->Paginator->sort('ID') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('Nome') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('Usuário (login)') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('Grupo ID') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('Criado em') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('Modificado em') ?></th>
                    <th class="actions nowrap"><?= __('Ações') .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td class='nowrap'><?= $this->Number->format($user->id) ?></td>
                    <td class='nowrap'><?= h($user->name) ?></td>
                    <td class='nowrap'><?= h($user->username) ?></td>
                    <td class='nowrap'><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td class='nowrap'><?= h($user->created->format('d/m/Y H:i:s')) ?></td>
                    <td class='nowrap'><?= (!empty($user->modified)) ? h($user->modified->format('d/m/Y H:i:s')) : '' ?></td>
                    <td class="actions nowrap">
                        <?= $this->Html->link(
                            '<i class="ti-eye"></i> ', 
                            ['action' => 'view', $user->id],
                            ['escape' => false] 
                        ) ?>
                    
                        <?= $this->Html->link(
                            '<i class="ti-pencil"></i> ', 
                            ['action' => 'edit', $user->id],
                            ['escape' => false] 
                        ) ?>

                        <?= $this->Form->postLink(
                            '<i class="ti-trash"></i> ',
                            ['action' => 'delete', $user->id],
                            ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $user->id), 'escapeTitle' => false, 'escape' => false]
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
