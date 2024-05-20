<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\People $people
 */
?>

<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Alterar Pessoa'), ['action' => 'edit', $people->id], ['class' => 'btn btn-primary btn-block mb-2']) ?>
            <?= $this->Form->postLink(__('Excluir Pessoa'), ['action' => 'delete', $people->id], [
                'confirm' => __('Are you sure you want to delete # {0}?', $people->id), 
                'class' => 'btn btn-danger btn-block mb-2'
            ]) ?>
            <?= $this->Html->link(__('Listar Pessoas'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary btn-block mb-2']) ?>
            <?= $this->Html->link(__('Nova Pessoa'), ['action' => 'add'], ['class' => 'btn btn-success btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="peoples view content">
            <h3><?= h($people->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($people->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($people->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Sec') ?></th>
                    <td><?= h($people->email_sec) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Terc') ?></th>
                    <td><?= h($people->email_terc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rg') ?></th>
                    <td><?= h($people->rg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($people->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cnpj') ?></th>
                    <td><?= h($people->cnpj) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inscricao Municipal') ?></th>
                    <td><?= h($people->inscricao_municipal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inscricao Estadual') ?></th>
                    <td><?= h($people->inscricao_estadual) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone Fixo') ?></th>
                    <td><?= h($people->telefone_fixo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone Celular') ?></th>
                    <td><?= h($people->telefone_celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone Comercial') ?></th>
                    <td><?= h($people->telefone_comercial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($people->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= $this->Number->format($people->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($people->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($people->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
