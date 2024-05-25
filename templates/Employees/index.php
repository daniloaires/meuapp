<?php

use App\Model\Entity\Employee;

?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="employees index content">
    <?= $this->Html->link(__('Novo Colaborador'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Listar Colaboradores') ?></h3>

    <!-- Search Form -->
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
        <legend><?= __('Pesquisar') ?></legend>
            <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('nome', [
                        'label' => 'Nome', 
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
                    <th class='nowrap'><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('rg', 'RG') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('estado_civil', 'Estado Civil') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('qtde_filhos', 'Qtde filhos') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('sexo', 'Sexo') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('nacionalidade', 'Nacionalidade') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('dt_nascimento', 'Nascimento') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('funcao', 'Função') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('sector_id', 'Setor') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('modalidade_contrato', 'Modalidade contrato') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('remuneracao', 'Remuneração') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th class='nowrap'><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                    <th class="actions nowrap"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td class='nowrap'><?= $this->Number->format($employee->id) ?></td>
                    <td class='nowrap'><?= h($employee->nome) ?></td>
                    <td class='nowrap'><?= h($employee->cpf) ?></td>
                    <td class='nowrap'><?= h($employee->rg) ?></td>
                    <td class='nowrap'><?= $employee->estado_civil === null ? '' : Employee::LIST_ESTADO_CIVIL_STR[$employee->estado_civil] ?></td>
                    <td class='nowrap'><?= $employee->qtde_filhos === null ? '' : $this->Number->format($employee->qtde_filhos) ?></td>
                    <td class='nowrap'><?= $employee->sexo === null ? '' : Employee::LIST_SEXO_STR[$employee->sexo] ?></td>
                    <td class='nowrap'><?= $employee->nacionalidade === null ? '' : Employee::LIST_NACIONALIDADE_STR[$employee->nacionalidade] ?></td>
                    <td class='nowrap'><?= h($employee->dt_nascimento->format('d/m/Y')) ?></td>
                    <td class='nowrap'><?= h($employee->funcao) ?></td>
                    <td class='nowrap'><?= $employee->has('sector') ? $this->Html->link($employee->sector->name, ['controller' => 'Sectors', 'action' => 'view', $employee->sector->id]) : '' ?></td>
                    <td class='nowrap'><?= $employee->modalidade_contrato === null ? '' : Employee::LIST_MODALIDADE_CONTRATO_STR[$employee->modalidade_contrato] ?></td>
                    <td class='nowrap'><?= $employee->remuneracao === null ? '' : $this->Number->currency($employee->remuneracao, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤#,##0.00']) ?></td>
                    <td class='nowrap'><?= h($employee->created->format('d/m/Y H:i:s')) ?></td>
                    <td class='nowrap'><?= (!empty($employee->modified)) ? h($employee->modified->format('d/m/Y H:i:s')) : '' ?></td>
                    <td class="actions nowrap">
                        <?= $this->Html->link(
                            '<i class="ti-eye"></i> ', 
                            ['action' => 'view', $employee->id],
                            ['escape' => false] 
                        ) ?>
                    
                        <?= $this->Html->link(
                            '<i class="ti-pencil"></i> ', 
                            ['action' => 'edit', $employee->id],
                            ['escape' => false] 
                        ) ?>

                        <?= $this->Form->postLink(
                            '<i class="ti-trash"></i> ',
                            ['action' => 'delete', $employee->id],
                            ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $employee->id), 'escapeTitle' => false, 'escape' => false]
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
