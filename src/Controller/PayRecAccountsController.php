<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class PayRecAccountsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        // Get search parameters
        $searchTipo = $this->request->getQuery('tipo');
        $searchNome = $this->request->getQuery('nome');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');

        // Set up query conditions
        $conditions = [];
        if (!empty($searchNome)) {
            $conditions['descricao LIKE'] = '%' . $searchNome . '%';
        }
        if (!empty($searchTipo)) {
            $conditions['tipo ='] = $searchTipo;
        }        
        if (!empty($createdFrom)) {
            $conditions['created >='] = $createdFrom;
        }
        if (!empty($createdTo)) {
            $conditions['created <='] = $createdTo;
        }

        // Fetch data with conditions
        $payRecAccountTable = TableRegistry::getTableLocator()->get('CashFlows');
        $query = $payRecAccountTable->find('all')
            ->where($conditions);

        // Get the sum of the 'valor' field
        $sumQuery = $payRecAccountTable->find();
        $valorTotal = $sumQuery->select([
            'total' => $sumQuery->func()->sum('valor')
        ])
        ->where($conditions)
        ->first()
        ->total;

        $payRecAccounts = $this->Paginator->paginate($query);

        $this->set(compact('payRecAccounts', 'valorTotal'));
    }

    /**
     * View method
     *
     * @param string|null $id Pay Rec Account id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payRecAccount = $this->PayRecAccounts->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('payRecAccount'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payRecAccount = $this->PayRecAccounts->newEmptyEntity();
        if ($this->request->is('post')) {
            $payRecAccount = $this->PayRecAccounts->patchEntity($payRecAccount, $this->request->getData());
            if ($this->PayRecAccounts->save($payRecAccount)) {
                $this->Flash->success(__('The pay rec account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay rec account could not be saved. Please, try again.'));
        }
        $this->set(compact('payRecAccount'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Rec Account id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payRecAccount = $this->PayRecAccounts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payRecAccount = $this->PayRecAccounts->patchEntity($payRecAccount, $this->request->getData());
            if ($this->PayRecAccounts->save($payRecAccount)) {
                $this->Flash->success(__('The pay rec account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay rec account could not be saved. Please, try again.'));
        }
        $this->set(compact('payRecAccount'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Rec Account id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payRecAccount = $this->PayRecAccounts->get($id);
        if ($this->PayRecAccounts->delete($payRecAccount)) {
            $this->Flash->success(__('The pay rec account has been deleted.'));
        } else {
            $this->Flash->error(__('The pay rec account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
