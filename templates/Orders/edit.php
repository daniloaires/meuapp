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
                <legend><?= __('Pedido: ' . h($order->nome)) ?></legend>
            </fieldset>

            <div class="row">
                <div class="col-md-8">
                    <label for="product-search"><?= __('Produto') ?></label>
                    <input type="text" id="product-search" class="form-control" placeholder="Digite o nome do produto">
                    <input type="hidden" id="order-id" value="<?= $order->id ?>">
                    <input type="hidden" id="product-id">
                    <input type="hidden" id="product-valor">
                </div>
                <div class="col-md-2">
                <label for="qtde"><?= __('Quantidade') ?></label>
                    <input type="number" id="qtde" class="form-control" placeholder="Quantidade">
                </div>

                <div class="col-md-2"><br />
                    <button id="add-item" class="btn btn-primary mb-2">
                        <?= __('Adicionar Item') ?></button>
                </div>                
            </div><hr />

            <h6><?= __('Itens do Pedido') ?></h6>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class='nowrap'><?= __('ID') ?></th>
                            <th class='nowrap'><?= __('Produto') ?></th>
                            <th class='nowrap'><?= __('Quantidade') ?></th>
                            <th class='nowrap'><?= __('Valor') ?></th>
                        </tr>
                    </thead>
                    <tbody id="order-items-table">
                        <?php if (!empty($order->order_items)): ?>
                            <?php foreach ($order->order_items as $orderItem): ?>
                                <tr>
                                    <td class='nowrap'><?= h($orderItem->id) ?></td>
                                    <td class='nowrap'><?= h($orderItem->product_id) ?></td>
                                    <td class='nowrap'><?= h($orderItem->qtde) ?></td>
                                    <td class='nowrap'><?= h($orderItem->valor) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4"><?= __('Nenhum item encontrado para este pedido.') ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?= $this->Form->button(__('Salvar pedido'), ['class' => 'btn btn-success float-right']) ?>
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
<!-- paginaAtual -->
<?= $this->Html->script('orders/add') ?>

<?= $this->Html->css(['https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css']) ?>
<?= $this->Html->script(['https://code.jquery.com/jquery-3.6.0.min.js']) ?>
<?= $this->Html->script(['https://code.jquery.com/ui/1.12.1/jquery-ui.min.js']) ?>