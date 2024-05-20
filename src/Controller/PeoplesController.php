<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Peoples Controller
 *
 * @property \App\Model\Table\PeoplesTable $Peoples
 * @method \App\Model\Entity\People[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeoplesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $peoples = $this->paginate($this->Peoples);

        $this->set(compact('peoples'));
    }

    /**
     * View method
     *
     * @param string|null $id People id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $people = $this->Peoples->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('people'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $people = $this->Peoples->newEmptyEntity();
        if ($this->request->is('post')) {
            $people = $this->Peoples->patchEntity($people, $this->request->getData());
            if ($this->Peoples->save($people)) {
                $this->Flash->success(__('The people has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The people could not be saved. Please, try again.'));
        }
        $this->set(compact('people'));
    }

    /**
     * Edit method
     *
     * @param string|null $id People id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $people = $this->Peoples->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $people = $this->Peoples->patchEntity($people, $this->request->getData());
            if ($this->Peoples->save($people)) {
                $this->Flash->success(__('The people has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The people could not be saved. Please, try again.'));
        }
        $this->set(compact('people'));
    }

    /**
     * Delete method
     *
     * @param string|null $id People id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $people = $this->Peoples->get($id);
        if ($this->Peoples->delete($people)) {
            $this->Flash->success(__('The people has been deleted.'));
        } else {
            $this->Flash->error(__('The people could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
