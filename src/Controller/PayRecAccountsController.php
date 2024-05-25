<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PayRecAccounts Controller
 *
 * @property \App\Model\Table\PayRecAccountsTable $PayRecAccounts
 * @method \App\Model\Entity\PayRecAccount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayRecAccountsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $payRecAccounts = $this->paginate($this->PayRecAccounts);

        $this->set(compact('payRecAccounts'));
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
