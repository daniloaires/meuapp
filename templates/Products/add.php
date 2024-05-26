<?php

use App\Model\Entity\Product;

?>

<div class="row">
    <aside class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Produtos'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="products form content">
            <?= $this->Form->create($product, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Adicionar Produto') ?></legend>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('nome', [
                            'class' => 'form-control',
                            'label' => 'Nome do Produto',
                            'placeholder' => 'Informe o Nome',
                        ]) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $this->Form->control('descricao', [
                            'class' => 'form-control',
                            'label' => 'Descrição',
                            'placeholder' => 'Informe a descrição',
                        ]) ?>
                    </div>                
                    <div class="col-md-3">
                        <?= $this->Form->control('unidade', [
                            'class' => 'form-control',
                            'type' => 'select',
                            'label' => 'Unidade',
                            'empty' => 'Selecione',
                            'options' => Product::LIST_UNIDADES_STR,
                        ]) ?>
                    </div> 
                    <div class="col-md-3">
                        <?= $this->Form->control('valor_compra', [
                            'class' => 'form-control dinheiro',
                            'type' => 'text',
                            'label' => 'Valor de compra',
                            'placeholder' => 'Informe o valor de compra',
                        ]) ?>
                    </div> 
                    <div class="col-md-3">
                        <?= $this->Form->control('valor_venda', [
                            'class' => 'form-control dinheiro',
                            'type' => 'text',
                            'label' => 'Valor de venda',
                            'placeholder' => 'Informe o valor de venda',
                        ]) ?>
                    </div> 
                    <div class="col-md-3">
                        <?= $this->Form->control('valor_locacao', [
                            'class' => 'form-control dinheiro',
                            'type' => 'text',
                            'label' => 'Valor Locação',
                            'placeholder' => 'Informe o valor de locação',
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control('estoque_min', [
                            'class' => 'form-control',
                            'label' => 'Estoque mínimo',
                            'placeholder' => 'Informe a qtde',
                        ]) ?>
                    </div>  
                    <div class="col-md-3">
                        <?= $this->Form->control('estoque', [
                            'class' => 'form-control',
                            'label' => 'Estoque',
                            'placeholder' => 'Informe a qtde',
                        ]) ?>
                    </div> 
                    <div class="col-md-12">
                        <?= $this->Form->control('foto', [
                            'type' => 'file', 
                            'id' => 'foto', 
                            'label' => 'Foto do Produto',
                            'class' => 'form-control'
                        ]); ?>  
                        <img id="preview" src="#" alt="Pré-visualização da imagem" 
                            style="display:none; max-width: 400px; max-height: 400px;" />
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
<?= $this->Html->script('products/add') ?>