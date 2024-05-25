<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AccountsPayableReceivable Controller
 *
 * @property \App\Model\Table\AccountsPayableReceivableTable $AccountsPayableReceivable
 * @method \App\Model\Entity\AccountsPayableReceivable[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountsPayableReceivableController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $accountsPayableReceivable = $this->paginate($this->AccountsPayableReceivable);

        $this->set(compact('accountsPayableReceivable'));
    }

    /**
     * View method
     *
     * @param string|null $id Accounts Payable Receivable id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountsPayableReceivable = $this->AccountsPayableReceivable->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('accountsPayableReceivable'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountsPayableReceivable = $this->AccountsPayableReceivable->newEmptyEntity();
        if ($this->request->is('post')) {
            $accountsPayableReceivable = $this->AccountsPayableReceivable->patchEntity($accountsPayableReceivable, $this->request->getData());
            if ($this->AccountsPayableReceivable->save($accountsPayableReceivable)) {
                $this->Flash->success(__('The accounts payable receivable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accounts payable receivable could not be saved. Please, try again.'));
        }
        $this->set(compact('accountsPayableReceivable'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Accounts Payable Receivable id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountsPayableReceivable = $this->AccountsPayableReceivable->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountsPayableReceivable = $this->AccountsPayableReceivable->patchEntity($accountsPayableReceivable, $this->request->getData());
            if ($this->AccountsPayableReceivable->save($accountsPayableReceivable)) {
                $this->Flash->success(__('The accounts payable receivable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accounts payable receivable could not be saved. Please, try again.'));
        }
        $this->set(compact('accountsPayableReceivable'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accounts Payable Receivable id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountsPayableReceivable = $this->AccountsPayableReceivable->get($id);
        if ($this->AccountsPayableReceivable->delete($accountsPayableReceivable)) {
            $this->Flash->success(__('The accounts payable receivable has been deleted.'));
        } else {
            $this->Flash->error(__('The accounts payable receivable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
