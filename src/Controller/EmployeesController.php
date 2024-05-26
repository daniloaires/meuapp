<?php
declare(strict_types=1);

namespace App\Controller;

class EmployeesController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
    
        // Obtenha os parâmetros de pesquisa
        $nome = $this->request->getQuery('nome');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');
    
        // Configurar condições de busca
        $conditions = [];
        if (!empty($nome)) {
            $conditions['Employees.nome LIKE'] = '%' . $nome . '%';
        }
        if (!empty($createdFrom)) {
            $conditions['Employees.created >='] = $createdFrom . ' 00:00:00';
        }
        if (!empty($createdTo)) {
            $conditions['Employees.created <='] = $createdTo . ' 23:59:59';
        }
    
        $employees = $this->Paginator->paginate($this->Employees->find('all', [
            'contain' => ['Sectors', 'AddressesEmployees'],
            'conditions' => $conditions,
        ]));
    
        $this->set(compact('employees'));
    }

    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Sectors', 'AddressesEmployees'],
        ]);

        $this->set(compact('employee'));
    }

    public function add()
    {
        $employee = $this->Employees->newEmptyEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel salvar. Por favor, tente novamente.'));
        }
        $sectors = $this->Employees->Sectors->find('list', ['limit' => 200])->all();
        $this->set(compact('employee', 'sectors'));
    }

    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['AddressesEmployees'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Alterado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possivel alterar. Por favor, tente novamente.'));
        }
        $sectors = $this->Employees->Sectors->find('list', ['limit' => 200])->all();
        $this->set(compact('employee', 'sectors'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('Excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possivel excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
