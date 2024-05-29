<?php
declare(strict_types=1);

namespace App\Controller;

class OrdersController extends AppController
{
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
}
