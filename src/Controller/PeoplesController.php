<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Peoples Controller
 *
 * @property \App\Model\Table\PeoplesTable $Peoples
 * @method \App\Model\Entity\People[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeoplesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        // Get search parameters
        $searchNome = $this->request->getQuery('nome');
        $searchEmail = $this->request->getQuery('email');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');

        // Set up query conditions
        $conditions = [];
        if (!empty($searchNome)) {
            $conditions['nome LIKE'] = '%' . $searchNome . '%';
        }
        if (!empty($searchEmail)) {
            $conditions['email LIKE'] = '%' . $searchEmail . '%';
        }
        if (!empty($createdFrom)) {
            $conditions['created >='] = $createdFrom;
        }
        if (!empty($createdTo)) {
            $conditions['created <='] = $createdTo;
        }

        // Fetch data with conditions
        $peoplesTable = TableRegistry::getTableLocator()->get('Peoples');
        $query = $peoplesTable->find('all')->where($conditions);

        $peoples = $this->Paginator->paginate($query);

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
