<?php

use App\Model\Entity\PayRecAccount;

?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="payRecAccounts index content">
<?= $this->Html->link(__('Nova Conta'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Contas a Pagar e Receber') ?></h3>

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
                        'empty' => 'Todos',
                        'options' => PayRecAccount::LIST_TIPO_CONTA_STR,
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
        <?= $this->Form->end() ?><hr />
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">            <thead>
                <tr>
                    <th class='nowrap'><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('tipo', 'Tipo') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('descricao', 'Descrição') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('valor', 'Valor') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('vencimento', 'Vencimento') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('status', 'Status') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th class="actions nowrap"><?= __('Ações' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payRecAccounts as $payRecAccount): ?>
                <tr>
                    <td class='nowrap'><?= $this->Number->format($payRecAccount->id) ?></td>
                    <td class='nowrap'><?= PayRecAccount::LIST_TIPO_CONTA_STR[$payRecAccount->tipo] ?></td>
                    <td class='nowrap'><?= h($payRecAccount->descricao) ?></td>
                    <td class='nowrap <?= $cor ?>'><?= $payRecAccount->valor === null ? '' : $this->Number->currency($payRecAccount->valor, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤ #,##0.00']) ?></td>
                    <td class='nowrap'><?= h($payRecAccount->vencimento->format('d/m/Y')) ?></td>
                    <td class='nowrap'><?= $this->Number->format($payRecAccount->status) ?></td>
                    <td class='nowrap'><?= h($payRecAccount->created->format('d/m/Y H:i:s')) ?></td>
                    <td class="actions nowrap">
                            <?= $this->Html->link(
                                '<i class="ti-eye"></i> ', 
                                ['action' => 'view', $payRecAccount->id],
                                ['escape' => false] 
                            ) ?>
                        
                            <?= $this->Html->link(
                                '<i class="ti-pencil"></i> ', 
                                ['action' => 'edit', $payRecAccount->id],
                                ['escape' => false] 
                            ) ?>

                            <?= $this->Form->postLink(
                                '<i class="ti-trash"></i> ',
                                ['action' => 'delete', $payRecAccount->id],
                                ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $payRecAccount->id), 'escapeTitle' => false, 'escape' => false]
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
