<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sector $sector
 */
?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Alterar Setor'), ['action' => 'edit', $sector->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(
                __('Excluir Setor'),
                ['action' => 'delete', $sector->id],
                [
                    'confirm' => __('Tem certesa de que deseja excluir # {0}?', $sector->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Setores'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
            <?= $this->Html->link(__('Novo Setor'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="sectors view content">
            <h3><?= h($sector->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($sector->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($sector->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado em') ?></th>
                    <td><?= h($sector->created->format('d/m/Y H:i:s')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= (!empty($sector->modified)) ? h($sector->modified->format('d/m/Y H:i:s')) : '' ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Colaboradores Relacionados') ?></h4>
                <?php if (!empty($sector->employees)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('ID') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('CPF') ?></th>
                            <th><?= __('RG') ?></th>
                            <th><?= __('Estado Civil') ?></th>
                            <th><?= __('Qtde Filhos') ?></th>
                            <th><?= __('Sexo') ?></th>
                            <th><?= __('Nacionalidade') ?></th>
                            <th><?= __('Nascimento') ?></th>
                            <th><?= __('Função') ?></th>
                            <th><?= __('Setor') ?></th>
                            <th><?= __('Modalidade Contrato') ?></th>
                            <th><?= __('Remuneração') ?></th>
                            <th><?= __('Obs') ?></th>
                            <th><?= __('Creado em') ?></th>
                            <th><?= __('Modificado') ?></th>
                            <th class="actions"><?= __('Ações') ?></th>
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
                            <td><?= h($employees->created->format('d/m/Y H:i:s')) ?></td>
                            <td><?= (!empty($employees->modified)) ? h($employees->modified->format('d/m/Y H:i:s')) : '' ?></td>
                            <td class="actions">
                            <?= $this->Html->link(
                                    '<i class="ti-eye"></i> ', 
                                    ['action' => 'view', $employees->id],
                                    ['escape' => false] 
                                ) ?>
                            
                                <?= $this->Html->link(
                                    '<i class="ti-pencil"></i> ', 
                                    ['action' => 'edit', $employees->id],
                                    ['escape' => false] 
                                ) ?>

                                <?= $this->Form->postLink(
                                    '<i class="ti-trash"></i> ',
                                    ['action' => 'delete', $employees->id],
                                    ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $employees->id), 'escapeTitle' => false, 'escape' => false]
                                ) ?>

                            </td>
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
