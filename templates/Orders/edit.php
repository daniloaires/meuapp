<?php

use App\Model\Entity\Order;

?>

<!-- ThemifyIcons -->
<?= $this->Html->css('../css-js/themify-icons/assets/themify-icons/themify-icons.css') ?>
<!-- jQueryUI -->
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.min') ?>

<div class="row">
    <aside class="col-md-2">
        <div class="bg-light p-3 rounded">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Pedidos'), ['action' => 'index'], ['class' => 'btn btn-outline-primary btn-block mb-2']) ?>
        </div>
    </aside>
    <div class="col-md-10">
        <div class="orders form content">
            <?= $this->Form->create($order) ?>
            <fieldset>
                <legend><?= __('Nº Pedido.: ' . h($order->nome)) ?></legend>
            </fieldset>

            <div class="row">
                <div class="col-md-8">
                    <label for="product-search"><?= __('Produto') ?></label>
                    <input type="text" id="product-search" class="form-control" 
                        placeholder="Digite o nome do produto">
                    <input type="hidden" name="_csrfToken" 
                        value="<?= $this->request->getAttribute('csrfToken') ?>">                    
                    <input type="hidden" id="order-id" value="<?= $order->id ?>">
                    <input type="hidden" id="product-id">
                    <input type="hidden" id="product-valor">
                </div>
                <div class="col-md-2">
                <label for="qtde"><?= __('Quantidade') ?></label>
                    <input type="number" id="qtde" min="0" class="form-control" 
                        placeholder="Quantidade" value="1">
                </div>

                <div class="col-md-2"><br />
                    <button id="add-item" class="btn btn-primary mb-2">
                        <?= __('Adicionar Item') ?></button>
                </div>                
            </div>

            <h1><a id="produto-selecionado" style="color:blue;"></a>&nbsp;</h1>

            <h6><?= __('Itens do Pedido') ?></h6>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class='nowrap'><?= __('ID') ?></th>
                            <th class='nowrap'><?= __('Produto') ?></th>
                            <th class='nowrap'><?= __('Valor') ?></th>
                            <th class='nowrap'><?= __('Quantidade') ?></th>
                            <th class='nowrap'><?= __('Total') ?></th>
                            <th class='nowrap'><?= __('Ações') ?></th>
                        </tr>
                    </thead>
                    <tbody id="order-items-table">
                        <?php if (!empty($order->order_items)): ?>
                            <?php foreach ($order->order_items as $orderItem): ?>
                                <tr data-id="<?= $orderItem->id ?>">
                                    <td class='nowrap'><?= h($orderItem->id) ?></td>
                                    <td class='nowrap'><?= h($orderItem->product->nome) ?></td>
                                    <td class='nowrap'><?= h($this->Number->currency($orderItem->valor, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤ #,##0.00'])) ?></td>
                                    <td class='nowrap'><?= h($orderItem->qtde) ?></td>
                                    <td class='nowrap'><?= h($this->Number->currency($orderItem->valor * $orderItem->qtde, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤ #,##0.00'])) ?></td>
                                    <td class='nowrap'>
                                        <button class="btn btn-danger btn-sm delete-item" style="padding: 1px;"
                                            data-id="<?= $orderItem->id ?>"><?= __('Excluir') ?></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6"><?= __('Nenhum item encontrado para este pedido.') ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            <div class="sum-container float-right">
                <h4>Valor total: <?= $this->Number->currency($valorTotal, 'BRL', ['locale' => 'pt_BR', 'pattern' => '¤ #,##0.00']) ?></h4>
            </div>                  

            </div>

            <?php
                if ($order->status === Order::STATUS_PEDIDO_ABERTO) {
                    echo $this->Form->button(__('Finalizar Pedido'), [
                        'class' => 'btn btn-success float-right',
                        'id' => 'fechar-pedido',
                        'data-valor' => $valorTotal,
                    ]);
                }
            ?>
            
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min') ?>
<!-- maskMoney -->
<?= $this->Html->script('../js/maskmoney.min.js') ?>
<!-- inputMask -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/inputmask/jquery.inputmask.min') ?>
<!-- jQueryUI -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.min') ?>
<!-- paginaAtual -->
<?= $this->Html->script('orders/add') ?>