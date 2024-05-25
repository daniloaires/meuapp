<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sector $sector
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Setores'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="sectors form content">
            <?= $this->Form->create($sector) ?>
            <fieldset class="form-group">
                <legend><?= __('Adicionar Setor') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('name', [
                        'class' => 'form-control',
                        'label' => 'Nome',
                        'placeholder' => 'Nome do Setor',
                    ]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Salvar Dados'), ['class' => 'btn btn-success float-right']) ?>
            <?= $this->Form->end() ?></br />
        </div>
    </div>
</div>
