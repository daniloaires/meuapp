<?php

use App\Model\Entity\PayRecAccount;

?>

<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Contas a Pagar/Receber'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="payRecAccounts form content">
            <?= $this->Form->create($payRecAccount) ?>
            <fieldset>
                <legend><?= __('Adicionar Conta a Pagar/Receber') ?></legend>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control('tipo', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Tipo',
                            'empty' => 'Selecione',
                            'options' => PayRecAccount::LIST_TIPO_CONTA_STR,
                        ]) ?>
                    </div>
                    <div class="col-md-9">
                        <?= $this->Form->control('descricao', [
                            'class' => 'form-control',
                            'label' => 'Descrição',
                            'placeholder' => 'Informe a descrição',
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control('valor', [
                            'class' => 'form-control dinheiro',
                            'label' => 'Valor',
                            'type' => 'text',
                            'placeholder' => 'Informe o valor',
                        ]) ?>
                    </div> 
                    <div class="col-md-3">
                        <?= $this->Form->control('vencimento', [
                            'class' => 'form-control',
                            'label' => 'Data de vencimento',
                            'placeholder' => 'Informe o vencimento',
                        ]) ?>
                    </div>                    
                    <div class="col-md-3">
                        <?= $this->Form->control('status', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Status',
                            'options' => PayRecAccount::LIST_STATUS_CONTA_STR,
                        ]) ?>
                    </div>                                       
                </div>
            </fieldset>
            <?= $this->Form->button(__('Salvar Dados'), ['class' => 'btn btn-success float-right']) ?>
            <?= $this->Form->end() ?><br /></br />
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min') ?>
<!-- maskMoney -->
<?= $this->Html->script('../js/maskmoney.min.js') ?>
<!-- inputMask -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min') ?>
<!-- paginaAtual -->
<?= $this->Html->script('payrecaccounts/add') ?>