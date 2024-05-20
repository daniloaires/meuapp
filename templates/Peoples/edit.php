<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\People $people
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $people->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $people->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Peoples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="peoples form content">
            <?= $this->Form->create($people) ?>
            <fieldset>
                <legend><?= __('Edit People') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('tipo', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Tipo',
                        'placeholder' => 'Informe o tipo de pessoa',
                    ]) ?>
                </div>                
                <div class="form-group">
                    <?= $this->Form->control('nome', [
                        'class' => 'form-control',
                        'label' => 'Nome',
                        'placeholder' => 'Informe o nome',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('email', [
                        'class' => 'form-control',
                        'label' => 'E-mail',
                        'placeholder' => 'Informe o e-mail',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('rg', [
                        'class' => 'form-control',
                        'label' => 'RG',
                        'placeholder' => 'Informe o RG',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('cpf', [
                        'class' => 'form-control',
                        'label' => 'CPF',
                        'placeholder' => 'Informe o CPF',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('cnpj', [
                        'class' => 'form-control',
                        'label' => 'CNPJ',
                        'placeholder' => 'Informe o CNPJ',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('inscricao_municipal', [
                        'class' => 'form-control',
                        'label' => 'Inscrição Municipal',
                        'placeholder' => 'Informe a Inscrição municipal',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('inscricao_estadual', [
                        'class' => 'form-control',
                        'label' => 'Inscrição Estadual',
                        'placeholder' => 'Informe a Inscrição estadual',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('telefone_celular', [
                        'class' => 'form-control',
                        'label' => 'Celular',
                        'placeholder' => 'Informe o celular',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('telefone_fixo', [
                        'class' => 'form-control',
                        'label' => 'Telefone Fixo',
                        'placeholder' => 'Informe o telefone fixo',
                    ]) ?>
                </div>                
                <div class="form-group">
                    <?= $this->Form->control('telefone_comercial', [
                        'class' => 'form-control',
                        'label' => 'Telefone Comercial',
                        'placeholder' => 'Informe o telefone comercial',
                    ]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
