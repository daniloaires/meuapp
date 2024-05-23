<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\People> $peoples
 */

use App\Model\Entity\People;

?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="peoples index content">
    <?= $this->Html->link(__('Nova Pessoa'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Listar Pessoas') ?></h3>

    <!-- Search Form -->
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
            <legend><?= __('Pesquisar') ?></legend>
            <div class="row">
                <div class="col-md-3">
                    <?= $this->Form->control('tipo', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Tipo',
                        'empty' => 'Selecione',
                        'options' => People::LIST_TIPO_PESSOA_STR,
                        'value' => $this->request->getQuery('tipo')
                    ]) ?>
                </div>             
                <div class="col-md-5">
                    <?= $this->Form->control('nome', [
                        'label' => 'Nome', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('nome')
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Form->control('email', [
                        'label' => 'Email', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('email')
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
                    <th class='nowrap'><?= $this->Paginator->sort('tipo', 'Tipo') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('email', 'E-mails') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('rg', 'RG')?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('cnpj', 'CNPJ') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('inscricao_municipal', 'I.M.') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('inscricao_estadual', 'I.E.') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('', 'Telefones') ?></th>                    
                    <th class='nowrap'><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th class="actions nowrap"><?= __('Ações' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peoples as $people): ?>
                <tr>
                    <td class='nowrap'><?= $this->Number->format($people->id) ?></td>
                    <td class='nowrap'><?= People::LIST_TIPO_PESSOA_STR[$people->tipo] ?></td>
                    <td class='nowrap'><?= h($people->nome) ?></td>
                    <td class='nowrap'><?= h($people->email . '; ' . $people->email_sec . '; ' . $people->email_terc) ?></td>
                    <td class='nowrap'><?= h($people->rg) ?></td>
                    <td class='nowrap'><?= h($people->cpf) ?></td>
                    <td class='nowrap'><?= h($people->cnpj) ?></td>
                    <td class='nowrap'><?= h($people->inscricao_municipal) ?></td>
                    <td class='nowrap'><?= h($people->inscricao_estadual) ?></td>
                    <td class='nowrap'><?= h($people->telefone_celular . '; ' . $people->telefone_fixo . '; ' . $people->telefone_comercial) ?></td>
                    <td class='nowrap'><?= h($people->created->format('d/m/Y H:i:s')) ?></td>
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
