<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 * @var string[]|\Cake\Collection\CollectionInterface $sectors
 */

use App\Model\Entity\Employee;
use App\Model\Entity\People;

?>
<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Colaboradores'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="employees form content">
            <?= $this->Form->create($employee) ?>
            <fieldset>
                <legend><?= __('Alterar Colaborador') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('nome', [
                        'class' => 'form-control',
                        'label' => 'Nome',
                        'placeholder' => 'Informe o Nome',
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
                    <?= $this->Form->control('rg', [
                        'class' => 'form-control',
                        'label' => 'RG',
                        'placeholder' => 'Informe o RG',
                    ]) ?>
                </div>                                              
                <div class="form-group">
                    <?= $this->Form->control('estado_civil', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Estado Civil',
                        'empty' => 'Selecione',
                        'options' => Employee::LIST_ESTADO_CIVIL_STR,
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('qtde_filhos', [
                        'class' => 'form-control',
                        'label' => 'Qtde. filhos',
                        'placeholder' => 'Número de filhos',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('sexo', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Sexo (Gênero)',
                        'empty' => 'Selecione',
                        'options' => Employee::LIST_SEXO_STR,
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('nacionalidade', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Nacionalidade',
                        'empty' => 'Selecione',
                        'options' => Employee::LIST_NACIONALIDADE_STR,
                    ]) ?>
                </div>  
                <div class="form-group">
                    <?= $this->Form->control('dt_nascimento', [
                        'class' => 'form-control',
                        'label' => 'Data de nascimento',
                        'placeholder' => 'Informe a Data de nascimento',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('funcao', [
                        'class' => 'form-control',
                        'label' => 'Função',
                        'placeholder' => 'Informe a função',
                    ]) ?>
                </div> 
                <div class="form-group">
                    <?= $this->Form->control('sector_id', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Setor',
                        'empty' => 'Selecione',
                        'options' => $sectors,
                    ]) ?>
                </div>   
                <div class="form-group">
                    <?= $this->Form->control('modalidade_contrato', [
                        'class' => 'form-control',
                        'type' => 'select',
                        'label' => 'Modalidade contrato',
                        'empty' => 'Selecione',
                        'options' => Employee::LIST_MODALIDADE_CONTRATO_STR,
                    ]) ?>
                </div>
                <div class="form-group">
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
                            'class' => 'form-control',
                            'label' => 'Logradouro',
                            'placeholder' => 'Informe o Logradouro',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('addresses_employees.0.numero', [
                            'class' => 'form-control',
                            'label' => 'Número',
                            'placeholder' => 'Informe o Número',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('addresses_employees.0.complemento', [
                            'class' => 'form-control',
                            'label' => 'Complemento',
                            'placeholder' => 'Informe o Complemento',
                        ]) ?>
                    </div>                    
                    <div class="col-md-6">
                        <?= $this->Form->control('addresses_employees.0.bairro', [
                            'class' => 'form-control',
                            'label' => 'Bairro',
                            'placeholder' => 'Informe o Bairro',
                        ]) ?>
                    </div>
                    <div class="col-md-8">
                        <?= $this->Form->control('addresses_employees.0.cidade', [
                            'class' => 'form-control',
                            'label' => 'Cidade',
                            'placeholder' => 'Informe a Cidade',
                        ]) ?>
                    </div>                    
                    <div class="col-md-4">
                        <?= $this->Form->control('addresses_employees.0.uf', [
                            'class' => 'form-control',
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
                <div class="form-group">
                    <?= $this->Form->control('obs', [
                        'class' => 'form-control',
                        'label' => 'Observações',
                        'placeholder' => 'Coloque aqui informações relevantes',
                    ]) ?>
                </div>                  
            </fieldset>
            <?= $this->Form->button(__('Alterar'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?><br />
        </div>
    </div>
</div>
