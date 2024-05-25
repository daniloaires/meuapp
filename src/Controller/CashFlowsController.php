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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cashFlows = $this->paginate($this->CashFlows);

        $this->set(compact('cashFlows'));
    }

    /**
     * View method
     *
     * @param string|null $id Cash Flow id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cashFlow = $this->CashFlows->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cashFlow'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
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

    /**
     * Edit method
     *
     * @param string|null $id Cash Flow id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

    /**
     * Delete method
     *
     * @param string|null $id Cash Flow id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
