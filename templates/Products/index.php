<?php



?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="products index content">
<?= $this->Html->link(__('Novo Produto'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Listar Produtos') ?></h3>

    <!-- Search Form -->
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
        <legend><?= __('Pesquisar') ?></legend>
            <div class="row">
                <div class="col-md-4">
                    <?= $this->Form->control('nome', [
                        'label' => 'Nome', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('nome')
                    ]) ?>
                </div>                
                <div class="col-md-4">
                    <?= $this->Form->control('descricao', [
                        'label' => 'Descrição', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('descricao')
                    ]) ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('created_from', [
                        'label' => 'Criado a partir de', 
                        'type' => 'date', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('created_from')
                    ]) ?>
                </div>
                <div class="col-md-2">
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
                    <th class='nowrap'><?= $this->Paginator->sort('nome', 'Nome do Produto') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('valor_venda', 'Valor venda') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('valor_locacao', 'Valor locação') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('estoque', 'Qtde estoque') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th class="actions nowrap"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class='nowrap'><?= $this->Number->format($product->id) ?></td>
                    <td class='nowrap'><?= h($product->nome) ?></td>
                    <td class='nowrap'><?= $product->valor_venda === null ? '' : $this->Number->currency($product->valor_venda, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤ #,##0.00']) ?></td>
                    <td class='nowrap'><?= $product->valor_locacao === null ? '' : $this->Number->currency($product->valor_locacao, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤ #,##0.00']) ?></td>
                    <td class='nowrap'><?= $this->Number->format($product->estoque) ?></td>
                    <td class='nowrap'><?= h($product->created->format('d/m/Y H:i:s')) ?></td>
                    <td class="actions nowrap">
                            <?= $this->Html->link(
                                '<i class="ti-eye"></i> ', 
                                ['action' => 'view', $product->id],
                                ['escape' => false] 
                            ) ?>
                        
                            <?= $this->Html->link(
                                '<i class="ti-pencil"></i> ', 
                                ['action' => 'edit', $product->id],
                                ['escape' => false] 
                            ) ?>

                            <?= $this->Form->postLink(
                                '<i class="ti-trash"></i> ',
                                ['action' => 'delete', $product->id],
                                ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $product->id), 'escapeTitle' => false, 'escape' => false]
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
