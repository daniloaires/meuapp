<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Employees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employees view content">
            <h3><?= h($employee->nome) ?></h3>
            <table>
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
                    <td><?= $employee->estado_civil === null ? '' : $this->Number->format($employee->estado_civil) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qtde Filhos') ?></th>
                    <td><?= $employee->qtde_filhos === null ? '' : $this->Number->format($employee->qtde_filhos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sexo') ?></th>
                    <td><?= $employee->sexo === null ? '' : $this->Number->format($employee->sexo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nacionalidade') ?></th>
                    <td><?= $employee->nacionalidade === null ? '' : $this->Number->format($employee->nacionalidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modalidade Contrato') ?></th>
                    <td><?= $employee->modalidade_contrato === null ? '' : $this->Number->format($employee->modalidade_contrato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Remuneracao') ?></th>
                    <td><?= $employee->remuneracao === null ? '' : $this->Number->format($employee->remuneracao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Nascimento') ?></th>
                    <td><?= h($employee->dt_nascimento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($employee->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($employee->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($employee->deleted) ?></td>
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
