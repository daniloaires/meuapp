<?php
declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
    
        // Obtenha os parâmetros de pesquisa
        $nome = $this->request->getQuery('nome');
        $descricao = $this->request->getQuery('descricao');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');
    
        // Configurar condições de busca
        $conditions = [];
        if (!empty($nome)) {
            $conditions['Products.nome LIKE'] = '%' . $nome . '%';
        }
        if (!empty($descricao)) {
            $conditions['Products.descricao LIKE'] = '%' . $descricao . '%';
        }        
        if (!empty($createdFrom)) {
            $conditions['Products.created >='] = $createdFrom . ' 00:00:00';
        }
        if (!empty($createdTo)) {
            $conditions['Products.created <='] = $createdTo . ' 23:59:59';
        }
    
        $products = $this->Paginator->paginate($this->Products->find('all', [
            'conditions' => $conditions,
        ]));
    
        $this->set(compact('products'));
    }

    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('product'));
    }

    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
