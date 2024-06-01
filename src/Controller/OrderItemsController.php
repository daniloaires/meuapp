<?php
declare(strict_types=1);

namespace App\Controller;

class OrderItemsController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Products'],
        ];
        $orderItems = $this->paginate($this->OrderItems);

        $this->set(compact('orderItems'));
    }

    public function view($id = null)
    {
        $orderItem = $this->OrderItems->get($id, [
            'contain' => ['Orders', 'Products'],
        ]);

        $this->set(compact('orderItem'));
    }

    public function add()
    {
        $orderItem = $this->OrderItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $orderItem = $this->OrderItems->patchEntity($orderItem, $this->request->getData());
            if ($this->OrderItems->save($orderItem)) {
                $this->Flash->success(__('The order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order item could not be saved. Please, try again.'));
        }
        $orders = $this->OrderItems->Orders->find('list', ['limit' => 200])->all();
        $products = $this->OrderItems->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('orderItem', 'orders', 'products'));
    }

    public function edit($id = null)
    {
        $orderItem = $this->OrderItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderItem = $this->OrderItems->patchEntity($orderItem, $this->request->getData());
            if ($this->OrderItems->save($orderItem)) {
                $this->Flash->success(__('The order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order item could not be saved. Please, try again.'));
        }
        $orders = $this->OrderItems->Orders->find('list', ['limit' => 200])->all();
        $products = $this->OrderItems->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('orderItem', 'orders', 'products'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderItem = $this->OrderItems->get($id);
        if ($this->OrderItems->delete($orderItem)) {
            $this->Flash->success(__('The order item has been deleted.'));
        } else {
            $this->Flash->error(__('The order item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
