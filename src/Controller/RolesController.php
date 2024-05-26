<?php
declare(strict_types=1);

namespace App\Controller;

class RolesController extends AppController
{
    public function initialize() : void 
    {
        parent::initialize();
    }

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
            $conditions['Roles.name LIKE'] = '%' . $name . '%';
        }
        if (!empty($createdFrom)) {
            $conditions['Roles.created >='] = $createdFrom . ' 00:00:00';
        }
        if (!empty($createdTo)) {
            $conditions['Roles.created <='] = $createdTo . ' 23:59:59';
        }
    
        $roles = $this->Paginator->paginate($this->Roles->find('all', [
            'conditions' => $conditions,
        ]));
    
        $this->set(compact('roles'));
    }

    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('role'));
    }

    public function add()
    {
        $role = $this->Roles->newEmptyEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel salvar. Por favor, tente novamente.'));
        }
        $this->set(compact('role'));
    }

    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Alterado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível alterar. Por favor, tente novamente.'));
        }
        $this->set(compact('role'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('Excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possivel excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
