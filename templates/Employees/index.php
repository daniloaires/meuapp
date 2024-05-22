<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Employee> $employees
 */
?>
<div class="employees index content">
    <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Employees') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cpf') ?></th>
                    <th><?= $this->Paginator->sort('rg') ?></th>
                    <th><?= $this->Paginator->sort('estado_civil') ?></th>
                    <th><?= $this->Paginator->sort('qtde_filhos') ?></th>
                    <th><?= $this->Paginator->sort('sexo') ?></th>
                    <th><?= $this->Paginator->sort('nacionalidade') ?></th>
                    <th><?= $this->Paginator->sort('dt_nascimento') ?></th>
                    <th><?= $this->Paginator->sort('funcao') ?></th>
                    <th><?= $this->Paginator->sort('sector_id') ?></th>
                    <th><?= $this->Paginator->sort('modalidade_contrato') ?></th>
                    <th><?= $this->Paginator->sort('remuneracao') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $this->Number->format($employee->id) ?></td>
                    <td><?= h($employee->nome) ?></td>
                    <td><?= h($employee->cpf) ?></td>
                    <td><?= h($employee->rg) ?></td>
                    <td><?= $employee->estado_civil === null ? '' : $this->Number->format($employee->estado_civil) ?></td>
                    <td><?= $employee->qtde_filhos === null ? '' : $this->Number->format($employee->qtde_filhos) ?></td>
                    <td><?= $employee->sexo === null ? '' : $this->Number->format($employee->sexo) ?></td>
                    <td><?= $employee->nacionalidade === null ? '' : $this->Number->format($employee->nacionalidade) ?></td>
                    <td><?= h($employee->dt_nascimento) ?></td>
                    <td><?= h($employee->funcao) ?></td>
                    <td><?= $employee->has('sector') ? $this->Html->link($employee->sector->name, ['controller' => 'Sectors', 'action' => 'view', $employee->sector->id]) : '' ?></td>
                    <td><?= $employee->modalidade_contrato === null ? '' : $this->Number->format($employee->modalidade_contrato) ?></td>
                    <td><?= $employee->remuneracao === null ? '' : $this->Number->format($employee->remuneracao) ?></td>
                    <td><?= h($employee->created) ?></td>
                    <td><?= h($employee->modified) ?></td>
                    <td><?= h($employee->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
