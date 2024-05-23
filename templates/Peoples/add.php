<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\People $people
 */

use App\Model\Entity\People;

?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Pessoas'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="peoples form content">
            <?= $this->Form->create($people) ?>
            <fieldset class="form-group">
                <legend><?= __('Adicionar Pessoa') ?></legend>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->control('tipo', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Tipo',
                            'empty' => 'Selecione',
                            'options' => People::LIST_TIPO_PESSOA_STR,
                        ]) ?>
                    </div>
                    <div class="col-md-8">
                        <?= $this->Form->control('nome', [
                            'class' => 'form-control',
                            'label' => 'Nome',
                            'placeholder' => 'Informe o nome',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('email', [
                            'class' => 'form-control',
                            'label' => 'E-mail 1',
                            'placeholder' => 'Informe o e-mail',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('email_sec', [
                            'class' => 'form-control',
                            'label' => 'E-mail 2',
                            'placeholder' => 'Informe o e-mail',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('email_terc', [
                            'class' => 'form-control',
                            'label' => 'E-mail 3',
                            'placeholder' => 'Informe o e-mail',
                        ]) ?>
                    </div>                                        
                    <div class="col-md-4">
                        <?= $this->Form->control('rg', [
                            'class' => 'form-control',
                            'label' => 'RG',
                            'placeholder' => 'Informe o RG',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('cpf', [
                            'class' => 'form-control cpf',
                            'label' => 'CPF',
                            'placeholder' => 'Informe o CPF',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('cnpj', [
                            'class' => 'form-control cnpj',
                            'label' => 'CNPJ',
                            'placeholder' => 'Informe o CNPJ',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('inscricao_municipal', [
                            'class' => 'form-control',
                            'label' => 'Inscrição Municipal',
                            'placeholder' => 'Informe a Inscrição municipal',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('inscricao_estadual', [
                            'class' => 'form-control',
                            'label' => 'Inscrição Estadual',
                            'placeholder' => 'Informe a Inscrição estadual',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('telefone_celular', [
                            'class' => 'form-control cel',
                            'label' => 'Celular',
                            'placeholder' => 'Informe o celular',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('telefone_fixo', [
                            'class' => 'form-control tel',
                            'label' => 'Telefone Fixo',
                            'placeholder' => 'Informe o telefone fixo',
                        ]) ?>
                    </div>                
                    <div class="col-md-4">
                        <?= $this->Form->control('telefone_comercial', [
                            'class' => 'form-control tel',
                            'label' => 'Telefone Comercial',
                            'placeholder' => 'Informe o telefone comercial',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('addresses_peoples.0.cep', [
                            'class' => 'form-control cep',
                            'label' => 'CEP',
                            'placeholder' => 'Informe o CEP',
                        ]) ?>
                    </div>
                    <div class="col-md-8">
                        <?= $this->Form->control('addresses_peoples.0.logradouro', [
                            'class' => 'form-control',
                            'label' => 'Logradouro',
                            'placeholder' => 'Informe o Logradouro',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('addresses_peoples.0.numero', [
                            'class' => 'form-control',
                            'label' => 'Número',
                            'placeholder' => 'Informe o Número',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('addresses_peoples.0.complemento', [
                            'class' => 'form-control',
                            'label' => 'Complemento',
                            'placeholder' => 'Informe o Complemento',
                        ]) ?>
                    </div>                    
                    <div class="col-md-6">
                        <?= $this->Form->control('addresses_peoples.0.bairro', [
                            'class' => 'form-control',
                            'label' => 'Bairro',
                            'placeholder' => 'Informe o Bairro',
                        ]) ?>
                    </div>
                    <div class="col-md-8">
                        <?= $this->Form->control('addresses_peoples.0.cidade', [
                            'class' => 'form-control',
                            'label' => 'Cidade',
                            'placeholder' => 'Informe a Cidade',
                        ]) ?>
                    </div>                    
                    <div class="col-md-4">
                        <?= $this->Form->control('addresses_peoples.0.uf', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Estado',
                            'empty' => 'Selecione',
                            'options' => People::LIST_ESTADOS_STR,
                        ]) ?>
                    </div>                    
                </div>
            </fieldset>
            <?= $this->Form->button(__('Cadastrar'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?><br />
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min') ?>
<!-- inputMask -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min') ?>
<!-- paginaAtual -->
<?= $this->Html->script('peoples/add') ?>