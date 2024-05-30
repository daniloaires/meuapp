<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Order;

class OrdersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Products');
    }

    public function index()
    {
        // Carrega todos os pedidos junto com seus itens e produtos
        $this->paginate = [
            'contain' => ['OrderItems', 'OrderItems.Products'],
        ];
        $orders = $this->paginate($this->Orders);
    
        // Calcula a soma do valor dos itens do pedido
        foreach ($orders as $order) {
            $order->valorTotal = 0;
            foreach ($order->order_items as $orderItem) {
                $order->valorTotal += $orderItem->valor * $orderItem->qtde;
            }
        }
    
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
            'status' => Order::STATUS_PEDIDO_NAO_PAGO,
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
            'contain' => [
                'OrderItems',
                'OrderItems.Products',
            ],
        ]);

        // Calcula a soma do valor dos itens do pedido
        $valorTotal = 0;
        foreach ($order->order_items as $orderItem) {
            $valorTotal += $orderItem->valor * $orderItem->qtde;
        }

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
        $this->set(compact('order', 'valorTotal'));
    }
    

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        // Verifica se o pedido existe
        $order = $this->Orders->get($id, [
            'contain' => ['OrderItems'],
        ]);
    
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('O pedido foi excluído.'));
        } else {
            $this->Flash->error(__('O pedido não pôde ser excluído. Por favor, tente novamente.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }

    public function addOrderItem()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $data = $this->request->getData();
    
            // Verifica se o item do pedido já existe
            $existingOrderItem = $this->Orders->OrderItems->find()
                ->where([
                    'order_id' => $data['order_id'],
                    'product_id' => $data['product_id']
                ])
                ->first();
    
            if ($existingOrderItem) {
                // Se o item do pedido já existir, atualize a quantidade
                $existingOrderItem->qtde += $data['qtde'];
                if ($this->Orders->OrderItems->save($existingOrderItem)) {
                    $response = ['success' => true, 'orderItem' => $existingOrderItem];
                } else {
                    $response = ['success' => false];
                }
            } else {
                // Se o item do pedido não existir, crie um novo
                $orderItem = $this->Orders->OrderItems->newEmptyEntity();
                $orderItem = $this->Orders->OrderItems->patchEntity($orderItem, $data);
    
                if ($this->Orders->OrderItems->save($orderItem)) {
                    $response = ['success' => true, 'orderItem' => $orderItem];
                } else {
                    $response = ['success' => false];
                }
            }
    
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode($response));
            return $this->response;
        }
    }

    public function getByCode()
    {
        $this->autoRender = false;
        $code = $this->request->getQuery('code');
        $product = $this->Products->find('all', [
            'conditions' => ['Products.codigo' => $code]
        ])->first();

        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode($product));
        return $this->response;
    }        

    public function deleteOrderItem($id = null)
    {
        if ($this->request->is('delete')) {
            $orderItem = $this->Orders->OrderItems->get($id);
        
            if ($this->Orders->OrderItems->delete($orderItem)) {
                $response = ['success' => true];
            } else {
                $response = ['success' => false];
            }
        
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode($response));
            return $this->response;
        }
    }
    

    public function autocomplete()
    {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');
    
        $term = $this->request->getQuery('term');
    
        $products = $this->Products->find('all', [
            'conditions' => ['OR' => [
                'Products.nome LIKE' => '%' . $term . '%',
                'Products.descricao LIKE' => '%' . $term . '%',
            ]],
            'limit' => 100
        ]);
    
        $result = [];
        foreach ($products as $product) {
            $result[] = [
                'id' => $product->id,
                'nome' => $product->nome,
                'valor' => $product->valor_venda
            ];
        }
    
        // Define os dados que serão enviados como resposta
        $data = $result;
    
        // Define o código de status HTTP da resposta (por exemplo, 200 para sucesso)
        $this->response = $this->response->withStatus(200);    
        // Retorna os dados e o código de status da resposta
        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
        return $this->response;
    }

}
