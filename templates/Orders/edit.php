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
                    <label for="product-id"><?= __('Produto') ?></label>
                    <input type="text" id="product-id" class="form-control" placeholder="Product ID">
                </div>
                <div class="col-md-2">
                    <label for="qtde"><?= __('Quantidade') ?></label>
                    <input type="number" id="qtde" class="form-control" placeholder="Quantidade">
                </div>

                <div class="col-md-2"><br />
                    <button id="add-item" class="btn btn-primary mb-2">
                        <?= __('Adicionar Item') ?>
                    </button>
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

<script>
    $(document).ready(function(){
        $('#add-item').on('click', function(e){
            e.preventDefault();

            // Coleta os dados do formulário
            var productId = $('#product-id').val();
            var qtde = $('#qtde').val();
            var valor = $('#valor').val();

            // Envia a requisição AJAX para adicionar o item
            $.ajax({
                url: '<?= $this->Url->build(['action' => 'addOrderItem', $order->id]) ?>',
                type: 'POST',
                data: {
                    product_id: productId,
                    qtde: qtde,
                    valor: valor
                },
                success: function(response) {
                    if (response.success) {
                        // Adiciona o novo item na tabela
                        $('#order-items-table').append(
                            '<tr>' +
                            '<td>' + response.orderItem.id + '</td>' +
                            '<td>' + response.orderItem.product_id + '</td>' +
                            '<td>' + response.orderItem.qtde + '</td>' +
                            '<td>' + response.orderItem.valor + '</td>' +
                            '</tr>'
                        );

                        // Limpa os campos do formulário
                        $('#product-id').val('');
                        $('#qtde').val('');
                        $('#valor').val('');
                    } else {
                        alert('Erro ao adicionar item');
                    }
                }
            });
        });
    });
</script>
