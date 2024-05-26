<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function initialize() : void 
    {
        parent::initialize();
    }

    public function login()	{
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
        $this->Flash->error('Usuário ou Senha incorretos!');
        }
    }      

    public function logout() {
        //Leave empty for now.
        $this->Flash->success(__('Até logo'));
        $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadComponent('Paginator');
    
        // Obtenha os parâmetros de pesquisa
        $name = $this->request->getQuery('name');
        $username = $this->request->getQuery('username');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');
    
        // Configurar condições de busca
        $conditions = [];
        if (!empty($name)) {
            $conditions['Users.name LIKE'] = '%' . $name . '%';
        }        
        if (!empty($username)) {
            $conditions['Users.username LIKE'] = '%' . $username . '%';
        }
        if (!empty($createdFrom)) {
            $conditions['Users.created >='] = $createdFrom . ' 00:00:00';
        }
        if (!empty($createdTo)) {
            $conditions['Users.created <='] = $createdTo . ' 23:59:59';
        }
    
        $users = $this->Paginator->paginate($this->Users->find('all', [
            'conditions' => $conditions,
            'contain' => ['Roles'],
        ]));
    
        $this->set(compact('users'));
    }
    
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel salvar. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Alterado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel alterar. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
