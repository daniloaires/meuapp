<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sectors Controller
 *
 * @property \App\Model\Table\SectorsTable $Sectors
 * @method \App\Model\Entity\Sector[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SectorsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
    
        // Obtenha os parâmetros de pesquisa
        $name = $this->request->getQuery('name');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');
    
        // Configurar condições de busca
        $conditions = [];
        if (!empty($name)) {
            $conditions['Sectors.name LIKE'] = '%' . $name . '%';
        }
        if (!empty($createdFrom)) {
            $conditions['Sectors.created >='] = $createdFrom . ' 00:00:00';
        }
        if (!empty($createdTo)) {
            $conditions['Sectors.created <='] = $createdTo . ' 23:59:59';
        }
    
        $sectors = $this->Paginator->paginate($this->Sectors->find('all', [
            'conditions' => $conditions,
        ]));
    
        $this->set(compact('sectors'));
    }

    public function view($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => ['Employees'],
        ]);

        $this->set(compact('sector'));
    }

    public function add()
    {
        $sector = $this->Sectors->newEmptyEntity();
        if ($this->request->is('post')) {
            $sector = $this->Sectors->patchEntity($sector, $this->request->getData());
            if ($this->Sectors->save($sector)) {
                $this->Flash->success(__('The sector has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sector could not be saved. Please, try again.'));
        }
        $this->set(compact('sector'));
    }

    public function edit($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sector = $this->Sectors->patchEntity($sector, $this->request->getData());
            if ($this->Sectors->save($sector)) {
                $this->Flash->success(__('The sector has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sector could not be saved. Please, try again.'));
        }
        $this->set(compact('sector'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sector = $this->Sectors->get($id);
        if ($this->Sectors->delete($sector)) {
            $this->Flash->success(__('The sector has been deleted.'));
        } else {
            $this->Flash->error(__('The sector could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
