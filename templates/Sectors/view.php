<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sector $sector
 */
?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>

<div class="row">
    <aside class="col-md-2">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Alterar Setor'), ['action' => 'edit', $sector->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(
                __('Excluir Setor'),
                ['action' => 'delete', $sector->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $sector->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Setores'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
            <?= $this->Html->link(__('Novo Setor'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-10">
        <div class="sectors view content">
            <h3><?= h($sector->name) ?></h3>
            <table>
                <tr>
                    <th class='nowrap'><?= __('Nome') ?></th>
                    <td class='nowrap'><?= h($sector->name) ?></td>
                </tr>
                <tr>
                    <th class='nowrap'><?= __('ID') ?></th>
                    <td class='nowrap'><?= $this->Number->format($sector->id) ?></td>
                </tr>
                <tr>
                    <th class='nowrap'><?= __('Criado em') ?></th>
                    <td class='nowrap'><?= h($sector->created->format('d/m/Y H:i:s')) ?></td>
                </tr>
                <tr>
                    <th class='nowrap'><?= __('Modificado') ?></th>
                    <td class='nowrap'><?= (!empty($sector->modified)) ? h($sector->modified->format('d/m/Y H:i:s')) : '' ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Colaboradores Relacionados') ?></h4>
                <?php if (!empty($sector->employees)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th class='nowrap'><?= __('ID') ?></th>
                            <th class='nowrap'><?= __('Nome') ?></th>
                            <th class='nowrap'><?= __('CPF') ?></th>
                            <th class='nowrap'><?= __('RG') ?></th>
                            <th class='nowrap'><?= __('Estado Civil') ?></th>
                            <th class='nowrap'><?= __('Qtde Filhos') ?></th>
                            <th class='nowrap'><?= __('Sexo') ?></th>
                            <th class='nowrap'><?= __('Nacionalidade') ?></th>
                            <th class='nowrap'><?= __('Nascimento') ?></th>
                            <th class='nowrap'><?= __('Função') ?></th>
                            <th class='nowrap'><?= __('Setor') ?></th>
                            <th class='nowrap'><?= __('Modalidade Contrato') ?></th>
                            <th class='nowrap'><?= __('Remuneração') ?></th>
                            <th class='nowrap'><?= __('Obs') ?></th>
                            <th class='nowrap'><?= __('Creado em') ?></th>
                            <th class='nowrap'><?= __('Modificado') ?></th>
                            <th class="actions nowrap"><?= __('Ações') ?></th>
                        </tr>
                        <?php foreach ($sector->employees as $employees) : ?>
                        <tr>
                            <td class='nowrap'><?= h($employees->id) ?></td>
                            <td class='nowrap'><?= h($employees->nome) ?></td>
                            <td class='nowrap'><?= h($employees->cpf) ?></td>
                            <td class='nowrap'><?= h($employees->rg) ?></td>
                            <td class='nowrap'><?= h($employees->estado_civil) ?></td>
                            <td class='nowrap'><?= h($employees->qtde_filhos) ?></td>
                            <td class='nowrap'><?= h($employees->sexo) ?></td>
                            <td class='nowrap'><?= h($employees->nacionalidade) ?></td>
                            <td class='nowrap'><?= h($employees->dt_nascimento) ?></td>
                            <td class='nowrap'><?= h($employees->funcao) ?></td>
                            <td class='nowrap'><?= h($employees->sector_id) ?></td>
                            <td class='nowrap'><?= h($employees->modalidade_contrato) ?></td>
                            <td class='nowrap'><?= h($employees->remuneracao) ?></td>
                            <td class='nowrap'><?= h($employees->obs) ?></td>
                            <td class='nowrap'><?= h($employees->created->format('d/m/Y H:i:s')) ?></td>
                            <td class='nowrap'><?= (!empty($employees->modified)) ? h($employees->modified->format('d/m/Y H:i:s')) : '' ?></td>
                            <td class="actions nowrap">
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
