<?php

use App\Model\Entity\CashFlow;

?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="cashFlows index content">
    <?= $this->Html->link(__('Nova Entrada/Saída'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Fluxo de Caixa') ?></h3>

    <!-- Search Form -->
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
        <legend><?= __('Pesquisar') ?></legend>
            <div class="row">
                <div class="col-md-2">
                    <?= $this->Form->control('tipo', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Tipo',
                        'empty' => 'Selecione',
                        'options' => CashFlow::LIST_TIPO_CAIXA_STR,
                        'value' => $this->request->getQuery('tipo')
                    ]) ?>
                </div>                
                <div class="col-md-6">
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
        <?= $this->Form->end() ?><br />
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class='nowrap'><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('descricao', 'Descrição') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('valor', 'Valor') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('tipo', 'Tipo') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('forma_pagto', 'Forma de pagamento') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('data', 'Data') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                    <th class="actions nowrap"><?= __('Ações') .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cashFlows as $cashFlow): ?>
                <tr>
                    <td class='nowrap'><?= $this->Number->format($cashFlow->id) ?></td>
                    <td class='nowrap'><?= h($cashFlow->descricao) ?></td>
                    <td class='nowrap'><?= $this->Number->format($cashFlow->valor) ?></td>
                    <td class='nowrap'><?= $this->Number->format($cashFlow->tipo) ?></td>
                    <td class='nowrap'><?= $this->Number->format($cashFlow->forma_pagto) ?></td>
                    <td class='nowrap'><?= h($cashFlow->data) ?></td>
                    <td class='nowrap'><?= h($cashFlow->created) ?></td>
                    <td class='nowrap'><?= h($cashFlow->modified) ?></td>
                    <td class='nowrap'><?= h($cashFlow->deleted) ?></td>
                    <td class="actions nowrap">
                        <?= $this->Html->link(
                            '<i class="ti-eye"></i> ', 
                            ['action' => 'view', $cashFlow->id],
                            ['escape' => false] 
                        ) ?>
                    
                        <?= $this->Html->link(
                            '<i class="ti-pencil"></i> ', 
                            ['action' => 'edit', $cashFlow->id],
                            ['escape' => false] 
                        ) ?>

                        <?= $this->Form->postLink(
                            '<i class="ti-trash"></i> ',
                            ['action' => 'delete', $cashFlow->id],
                            ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $cashFlow->id), 'escapeTitle' => false, 'escape' => false]
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
    <div class="sum-container float-right">
        <h4>Valor total: <?= $this->Number->currency($valorTotal, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤#,##0.00']) ?></h4>
    </div>    
</div>
