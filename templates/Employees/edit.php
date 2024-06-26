<?php

use App\Model\Entity\Employee;
use App\Model\Entity\People;

?>
<div class="row">
    <aside class="col-md-2">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir Colaborador'),
                ['action' => 'delete', $employee->id],
                [
                    'confirm' => __('Tem certeza de que deseja excluir # {0}?', $employee->id),
                    'class' => 'btn btn-danger btn-block mb-2'
                ]
            ) ?>
            <?= $this->Html->link(__('Listar Grupos'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-10">
        <div class="employees form content">
            <?= $this->Form->create($employee) ?>
            <fieldset>
                <legend><?= __('Alterar Colaborador') ?></legend>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->control('cpf', [
                            'class' => 'form-control cpf',
                            'label' => 'CPF',
                            'placeholder' => 'Informe o CPF',
                        ]) ?>
                    </div>                    
                    <div class="col-md-8">
                        <?= $this->Form->control('nome', [
                            'class' => 'form-control',
                            'label' => 'Nome',
                            'placeholder' => 'Informe o Nome',
                        ]) ?>
                    </div>  
                    <div class="col-md-4">
                        <?= $this->Form->control('rg', [
                            'class' => 'form-control',
                            'label' => 'RG',
                            'placeholder' => 'Informe o RG',
                        ]) ?>
                    </div>                                              
                    <div class="col-md-3">
                        <?= $this->Form->control('estado_civil', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Estado Civil',
                            'empty' => 'Selecione',
                            'options' => Employee::LIST_ESTADO_CIVIL_STR,
                        ]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->control('qtde_filhos', [
                            'class' => 'form-control',
                            'label' => 'Qtde. filhos',
                            'placeholder' => 'Qtde filhos',
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control('sexo', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Sexo (Gênero)',
                            'empty' => 'Selecione',
                            'options' => Employee::LIST_SEXO_STR,
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('email', [
                            'class' => 'form-control',
                            'label' => 'E-mail 1',
                            'placeholder' => 'Informe o e-mail',
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('email_sec', [
                            'class' => 'form-control',
                            'label' => 'E-mail 2',
                            'placeholder' => 'Informe o e-mail',
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
                        <?= $this->Form->control('nacionalidade', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Nacionalidade',
                            'empty' => 'Selecione',
                            'options' => Employee::LIST_NACIONALIDADE_STR,
                        ]) ?>
                    </div>  
                    <div class="col-md-3">
                        <?= $this->Form->control('dt_nascimento', [
                            'class' => 'form-control',
                            'label' => 'Data de nascimento',
                            'placeholder' => 'Informe a Data de nascimento',
                        ]) ?>
                    </div>
                    <div class="col-md-5">
                        <?= $this->Form->control('funcao', [
                            'class' => 'form-control',
                            'label' => 'Função',
                            'placeholder' => 'Informe a função',
                        ]) ?>
                    </div> 
                    <div class="col-md-4">
                        <?= $this->Form->control('sector_id', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Setor',
                            'empty' => 'Selecione',
                            'options' => $sectors,
                        ]) ?>
                    </div>   
                    <div class="col-md-4">
                        <?= $this->Form->control('modalidade_contrato', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Modalidade contrato',
                            'empty' => 'Selecione',
                            'options' => Employee::LIST_MODALIDADE_CONTRATO_STR,
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('remuneracao', [
                            'class' => 'form-control',
                            'label' => 'Remuneração',
                            'placeholder' => 'Informe o salário',
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->hidden('addresses_employees.0.id', [
                            'value' => $employee->AddressesEmployees->id
                        ]) ?>                    
                        <?= $this->Form->control('addresses_employees.0.cep', [
                            'class' => 'form-control cep',
                            'label' => 'CEP',
                            'placeholder' => 'Informe o CEP',
                        ]) ?>
                    </div>
                    <div class="col-md-8">
                        <?= $this->Form->control('addresses_employees.0.logradouro', [
                            'class' => 'form-control logradouro',
                            'label' => 'Logradouro',
                            'placeholder' => 'Informe o Logradouro',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('addresses_employees.0.numero', [
                            'class' => 'form-control numero',
                            'label' => 'Número',
                            'placeholder' => 'Informe o Número',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('addresses_employees.0.complemento', [
                            'class' => 'form-control complemento',
                            'label' => 'Complemento',
                            'placeholder' => 'Informe o Complemento',
                        ]) ?>
                    </div>                    
                    <div class="col-md-6">
                        <?= $this->Form->control('addresses_employees.0.bairro', [
                            'class' => 'form-control bairro',
                            'label' => 'Bairro',
                            'placeholder' => 'Informe o Bairro',
                        ]) ?>
                    </div>
                    <div class="col-md-8">
                        <?= $this->Form->control('addresses_employees.0.cidade', [
                            'class' => 'form-control cidade',
                            'label' => 'Cidade',
                            'placeholder' => 'Informe a Cidade',
                        ]) ?>
                    </div>                    
                    <div class="col-md-4">
                        <?= $this->Form->control('addresses_employees.0.uf', [
                            'class' => 'form-control uf',
                            'type' => 'select',
                            'label' => 'Estado',
                            'empty' => 'Selecione',
                            'options' => People::LIST_ESTADOS_STR,
                        ]) ?>
                    </div>                    
                    <div class="col-md-12">
                        <?= $this->Form->control('obs', [
                            'class' => 'form-control',
                            'label' => 'Observações',
                            'placeholder' => 'Coloque aqui informações relevantes',
                        ]) ?>
                    </div>                
                </div>
            </fieldset>
            <?= $this->Form->button(__('Alterar Dados'), ['class' => 'btn btn-success float-right']) ?>
            <?= $this->Form->end() ?><br /></br />
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min') ?>
<!-- inputMask -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min') ?>
<!-- paginaAtual -->
<?= $this->Html->script('employees/edit') ?>