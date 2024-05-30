<?php



?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="orders index content">
<?= $this->Html->link(__('Novo Pedido'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Listar Pedidos') ?></h3>
    
    <!-- Search Form -->
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
        <legend><?= __('Pesquisar') ?></legend>
            <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('nome', [
                        'label' => 'Numero do pedido', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('nome')
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
                    <th class='nowrap'><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('nome', 'Numero') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th class="actions nowrap"><?= __('Ações') .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td class='nowrap'><?= $this->Number->format($order->id) ?></td>
                    <td class='nowrap'><?= h($order->nome) ?></td>
                    <td class='nowrap'><?= h($order->created->format('d/m/Y H:i:s')) ?></td>
                    <td class="actions nowrap">
                        <?= $this->Html->link(
                            '<i class="ti-pencil"></i> ', 
                            ['action' => 'edit', $order->id],
                            ['escape' => false] 
                        ) ?>
                        
                        <?= $this->Form->postLink(
                            '<i class="ti-trash"></i> ',
                            ['action' => 'delete', $order->id],
                            ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $order->id), 'escapeTitle' => false, 'escape' => false]
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
