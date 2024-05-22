<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sector $sector
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sector'), ['action' => 'edit', $sector->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sector'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sectors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sector'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sectors view content">
            <h3><?= h($sector->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($sector->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sector->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sector->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sector->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($sector->deleted) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Employees') ?></h4>
                <?php if (!empty($sector->employees)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Cpf') ?></th>
                            <th><?= __('Rg') ?></th>
                            <th><?= __('Estado Civil') ?></th>
                            <th><?= __('Qtde Filhos') ?></th>
                            <th><?= __('Sexo') ?></th>
                            <th><?= __('Nacionalidade') ?></th>
                            <th><?= __('Dt Nascimento') ?></th>
                            <th><?= __('Funcao') ?></th>
                            <th><?= __('Sector Id') ?></th>
                            <th><?= __('Modalidade Contrato') ?></th>
                            <th><?= __('Remuneracao') ?></th>
                            <th><?= __('Obs') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sector->employees as $employees) : ?>
                        <tr>
                            <td><?= h($employees->id) ?></td>
                            <td><?= h($employees->nome) ?></td>
                            <td><?= h($employees->cpf) ?></td>
                            <td><?= h($employees->rg) ?></td>
                            <td><?= h($employees->estado_civil) ?></td>
                            <td><?= h($employees->qtde_filhos) ?></td>
                            <td><?= h($employees->sexo) ?></td>
                            <td><?= h($employees->nacionalidade) ?></td>
                            <td><?= h($employees->dt_nascimento) ?></td>
                            <td><?= h($employees->funcao) ?></td>
                            <td><?= h($employees->sector_id) ?></td>
                            <td><?= h($employees->modalidade_contrato) ?></td>
                            <td><?= h($employees->remuneracao) ?></td>
                            <td><?= h($employees->obs) ?></td>
                            <td><?= h($employees->created) ?></td>
                            <td><?= h($employees->modified) ?></td>
                            <td><?= h($employees->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
