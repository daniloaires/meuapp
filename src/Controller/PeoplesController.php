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
        $searchTipo = $this->request->getQuery('tipo');
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
        $peoplesTable = TableRegistry::getTableLocator()->get('Peoples');
        $query = $peoplesTable->find('all')
            ->contain(['AddressesPeoples'])
            ->where($conditions);

        $peoples = $this->Paginator->paginate($query);

        $this->set(compact('peoples'));
    }
    
    public function view($id = null)
    {
        $people = $this->Peoples->get($id, [
            'contain' => ['AddressesPeoples'],
        ]);

        $this->set(compact('people'));
    }

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

    public function edit($id = null)
    {
        $people = $this->Peoples->get($id, [
            'contain' => ['AddressesPeoples'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $people = $this->Peoples->patchEntity($people, $this->request->getData());

            dd($people);

            if ($this->Peoples->save($people)) {
                $this->Flash->success(__('The people has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The people could not be saved. Please, try again.'));
        }
        $this->set(compact('people'));
    }

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
