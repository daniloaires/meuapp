<?php
declare(strict_types=1);

namespace App\Controller;

class OrdersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Products');
    }

    public function index()
    {
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['OrderItems'],
        ]);

        $this->set(compact('order'));
    }

    public function add()
    {
        // Cria uma nova entidade vazia para Orders
        $order = $this->Orders->newEmptyEntity();
    
        // Gera um hash único usando uniqid e random_bytes
        $hash = hash('sha256', uniqid(bin2hex(random_bytes(32)), true));
    
        // Preenche a entidade Order com o hash gerado
        $order = $this->Orders->patchEntity($order, [
            'nome' => $hash,
        ]);
    
        if ($this->Orders->save($order)) {
            // Redireciona para a página de edição do pedido recém-criado
            return $this->redirect(['action' => 'edit', $order->id]);
        }
    
        // Em caso de erro ao salvar, redefine a variável para a view
        $this->set(compact('order', 'hash'));
    }

    public function edit($id = null)
    {
        // Carrega o pedido específico junto com seus itens
        $order = $this->Orders->get($id, [
            'contain' => ['OrderItems'],
        ]);
    
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Atualiza a entidade Order com os dados do formulário
            $order = $this->Orders->patchEntity($order, $this->request->getData());
    
            if ($this->Orders->save($order)) {
                // Redireciona para outra página, por exemplo, a lista de pedidos
                return $this->redirect(['action' => 'index']);
            }
    
            // Em caso de erro, exibe uma mensagem (opcional)
            $this->Flash->error(__('O pedido não pôde ser salvo. Por favor, tente novamente.'));
        }
    
        // Passa o pedido e os itens para a view
        $this->set(compact('order'));
    }
    

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addOrderItem($orderId)
    {
        $this->request->allowMethod(['post']);
    
        $orderItem = $this->Orders->OrderItems->newEmptyEntity();
        $orderItem = $this->Orders->OrderItems->patchEntity($orderItem, [
            'order_id' => $orderId,
            'product_id' => $this->request->getData('product_id'),
            'qtde' => $this->request->getData('qtde'),
            'valor' => $this->request->getData('valor')
        ]);
    
        if ($this->Orders->OrderItems->save($orderItem)) {
            $response = ['success' => true, 'orderItem' => $orderItem];
        } else {
            $response = ['success' => false];
        }
    
        $this->set(compact('response'));
        $this->viewBuilder()->setOption('serialize', 'response');
    }

    public function autocomplete()
    {
        $this->request->allowMethod('ajax');

        $term = $this->request->getQuery('term');

        $products = $this->Orders->Products->find('all', [
            'conditions' => ['OR' => [
                'Products.nome LIKE' => '%' . $term . '%',
                'Products.descricao LIKE' => '%' . $term . '%',
            ]],
        ]);

        $result = [];
        foreach ($products as $product) {
            $result[] = [
                'id' => $product->id,
                'nome' => $product->nome,
                //'valor' => $product->valor
            ];
        }

        $this->set(compact('result'));
        $this->viewBuilder()->setOption('serialize', 'result');
    }    

}
