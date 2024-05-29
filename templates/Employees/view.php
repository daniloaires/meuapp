<?php

use App\Model\Entity\Employee;

?>

<div class="row">
    <aside class="col-md-2">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Alterar Colaborador'), ['action' => 'edit', $employee->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(
                __('Excluir Colaborador'),
                ['action' => 'delete', $employee->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $employee->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Colaboradores'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
            <?= $this->Html->link(__('Novo Colaborador'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-10">
        <div class="employees view content">
            <h3><?= h($employee->nome) ?></h3>
            <table class="table table-striped">
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($employee->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($employee->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rg') ?></th>
                    <td><?= h($employee->rg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Funcao') ?></th>
                    <td><?= h($employee->funcao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sector') ?></th>
                    <td><?= $employee->has('sector') ? $this->Html->link($employee->sector->name, ['controller' => 'Sectors', 'action' => 'view', $employee->sector->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($employee->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado Civil') ?></th>
                    <td><?= $employee->estado_civil === null ? '' : Employee::LIST_ESTADO_CIVIL_STR[$employee->estado_civil] ?></td>
                </tr>
                <tr>
                    <th><?= __('Qtde Filhos') ?></th>
                    <td><?= $employee->qtde_filhos === null ? '' : $this->Number->format($employee->qtde_filhos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sexo') ?></th>
                    <td><?= $employee->sexo === null ? '' : Employee::LIST_SEXO_STR[$employee->sexo] ?></td>
                </tr>
                <tr>
                    <th><?= __('Nacionalidade') ?></th>
                    <td><?= $employee->nacionalidade === null ? '' : Employee::LIST_NACIONALIDADE_STR[$employee->nacionalidade] ?></td>
                </tr>
                <tr>
                    <th><?= __('Modalidade Contrato') ?></th>
                    <td><?= $employee->modalidade_contrato === null ? '' : Employee::LIST_MODALIDADE_CONTRATO_STR[$employee->modalidade_contrato] ?></td>
                </tr>
                <tr>
                    <th><?= __('Remuneracao') ?></th>
                    <td><?= $employee->remuneracao === null ? '' : $this->Number->currency($employee->remuneracao, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤ #,##0.00']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Nascimento') ?></th>
                    <td><?= h($employee->dt_nascimento->format('d/m/Y')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($employee->created->format('d/m/Y H:i:s')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= (!empty($employee->modified)) ? h($employee->modified->format('d/m/Y H:i:s')) : '' ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Obs') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($employee->obs)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
