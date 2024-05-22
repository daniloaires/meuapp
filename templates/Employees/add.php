<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 * @var \Cake\Collection\CollectionInterface|string[] $sectors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Employees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employees form content">
            <?= $this->Form->create($employee) ?>
            <fieldset>
                <legend><?= __('Add Employee') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('cpf');
                    echo $this->Form->control('rg');
                    echo $this->Form->control('estado_civil');
                    echo $this->Form->control('qtde_filhos');
                    echo $this->Form->control('sexo');
                    echo $this->Form->control('nacionalidade');
                    echo $this->Form->control('dt_nascimento', ['empty' => true]);
                    echo $this->Form->control('funcao');
                    echo $this->Form->control('sector_id', ['options' => $sectors, 'empty' => true]);
                    echo $this->Form->control('modalidade_contrato');
                    echo $this->Form->control('remuneracao');
                    echo $this->Form->control('obs');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
