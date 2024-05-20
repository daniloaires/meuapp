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
    <h3><?= __('Listar Pessoas') ?></h3>

    <!-- Search Form -->
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
            <legend><?= __('Pesquisar') ?></legend>
            <div class="row">
                <div class="col-md-7">
                    <?= $this->Form->control('nome', [
                        'label' => 'Nome', 
                        'class' => 'form-control', 
                        'value' => $this->request->getQuery('nome')
                    ]) ?>
                </div>
                <div class="col-md-5">
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
        <?= $this->Form->button(__('Pesquisar'), ['class' => 'btn btn-primary']) ?>        
        <?= $this->Form->end() ?><hr />
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('tipo', 'Tipo') ?></th>
                    <th><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-mails') ?></th>
                    <th><?= $this->Paginator->sort('rg', 'RG')?></th>
                    <th><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
                    <th><?= $this->Paginator->sort('cnpj', 'CNPJ') ?></th>
                    <th><?= $this->Paginator->sort('inscricao_municipal', 'I.M.') ?></th>
                    <th><?= $this->Paginator->sort('inscricao_estadual', 'I.E.') ?></th>
                    <th><?= $this->Paginator->sort('telefone_celular', 'Celular') ?></th>
                    <th><?= $this->Paginator->sort('telefone_fixo', 'Tel. Fixo') ?></th>                    
                    <th><?= $this->Paginator->sort('telefone_comercial', 'Tel. Comercial') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado em') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peoples as $people): ?>
                <tr>
                    <td><?= $this->Number->format($people->id) ?></td>
                    <td><?= $this->Number->format($people->tipo) ?></td>
                    <td><?= h($people->nome) ?></td>
                    <td><?= h($people->email . '; ' . $people->email_sec . '; ' . $people->email_terc) ?></td>
                    <td><?= h($people->rg) ?></td>
                    <td><?= h($people->cpf) ?></td>
                    <td><?= h($people->cnpj) ?></td>
                    <td><?= h($people->inscricao_municipal) ?></td>
                    <td><?= h($people->inscricao_estadual) ?></td>
                    <td><?= h($people->telefone_celular) ?></td>
                    <td><?= h($people->telefone_fixo) ?></td>                    
                    <td><?= h($people->telefone_comercial) ?></td>
                    <td><?= h($people->created->format('d/m/Y H:i:s')) ?></td>
                    <td><?= (!empty($people->modified)) ? h($people->modified->format('d/m/Y H:i:s')) : '' ?></td>
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
