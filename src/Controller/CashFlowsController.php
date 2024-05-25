<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CashFlows Controller
 *
 * @property \App\Model\Table\CashFlowsTable $CashFlows
 * @method \App\Model\Entity\CashFlow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CashFlowsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
    
        // Obtenha os parâmetros de pesquisa
        $descricao = $this->request->getQuery('descricao');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');
    
        // Configurar condições de busca
        $conditions = [];
        if (!empty($descricao)) {
            $conditions['cashFlows.name LIKE'] = '%' . $descricao . '%';
        }
        if (!empty($createdFrom)) {
            $conditions['cashFlows.created >='] = $createdFrom . ' 00:00:00';
        }
        if (!empty($createdTo)) {
            $conditions['cashFlows.created <='] = $createdTo . ' 23:59:59';
        }
    
        $cashFlows = $this->Paginator->paginate($this->cashFlows->find('all', [
            'conditions' => $conditions,
        ]));
    
        $this->set(compact('cashFlows'));
    }

    public function view($id = null)
    {
        $cashFlow = $this->CashFlows->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cashFlow'));
    }

    public function add()
    {
        $cashFlow = $this->CashFlows->newEmptyEntity();
        if ($this->request->is('post')) {
            $cashFlow = $this->CashFlows->patchEntity($cashFlow, $this->request->getData());
            if ($this->CashFlows->save($cashFlow)) {
                $this->Flash->success(__('The cash flow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cash flow could not be saved. Please, try again.'));
        }
        $this->set(compact('cashFlow'));
    }

    public function edit($id = null)
    {
        $cashFlow = $this->CashFlows->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cashFlow = $this->CashFlows->patchEntity($cashFlow, $this->request->getData());
            if ($this->CashFlows->save($cashFlow)) {
                $this->Flash->success(__('The cash flow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cash flow could not be saved. Please, try again.'));
        }
        $this->set(compact('cashFlow'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cashFlow = $this->CashFlows->get($id);
        if ($this->CashFlows->delete($cashFlow)) {
            $this->Flash->success(__('The cash flow has been deleted.'));
        } else {
            $this->Flash->error(__('The cash flow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
