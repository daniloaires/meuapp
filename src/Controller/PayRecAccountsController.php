<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\PayRecAccount;
use Cake\ORM\TableRegistry;

class PayRecAccountsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        // Get search parameters
        $searchTipo = $this->request->getQuery('tipo');
        $searchStatus = $this->request->getQuery('status');
        $searchNome = $this->request->getQuery('nome');
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');
        $vencimentoFrom = $this->request->getQuery('vencimento_from');
        $vencimentoTo = $this->request->getQuery('vencimento_to');        

        // Set up query conditions
        $conditions = [];
        if (!empty($searchNome)) {
            $conditions['descricao LIKE'] = '%' . $searchNome . '%';
        }
        if (!empty($searchTipo)) {
            $conditions['tipo ='] = $searchTipo;
        }  
        if (!empty($searchStatus)) {
            $conditions['status ='] = $searchStatus;
        }                
        if (!empty($createdFrom)) {
            $conditions['created >='] = $createdFrom;
        }
        if (!empty($createdTo)) {
            $conditions['created <='] = $createdTo;
        }
        if (!empty($vencimentoFrom)) {
            $conditions['vencimento >='] = $vencimentoFrom;
        }
        if (!empty($vencimentoTo)) {
            $conditions['vencimento <='] = $vencimentoTo;
        }        

        // Fetch data with conditions
        $payRecAccountsTable = TableRegistry::getTableLocator()->get('PayRecAccounts');
        $query = $payRecAccountsTable->find('all')
            ->where($conditions);

        // Get the sum of the 'valor' field for both types
        $totalAPagar = $this->getSumByType($payRecAccountsTable, $conditions, PayRecAccount::CONTA_PAGAR);
        $totalAReceber = $this->getSumByType($payRecAccountsTable, $conditions, PayRecAccount::CONTA_RECEBER);

        $payRecAccounts = $this->Paginator->paginate($query);

        $this->set(compact('payRecAccounts', 'totalAPagar', 'totalAReceber'));
    }

    public function view($id = null)
    {
        $payRecAccount = $this->PayRecAccounts->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('payRecAccount'));
    }

    public function add()
    {
        $payRecAccount = $this->PayRecAccounts->newEmptyEntity();
        if ($this->request->is('post')) {
            $payRecAccount = $this->PayRecAccounts->patchEntity($payRecAccount, $this->request->getData());

            // Limpar o valor antes de salvar
            $valor = $this->request->getData('valor');
            $valorLimpo = str_replace(['R$', '.', ','], ['', '', '.'], $valor);
            $payRecAccount->valor = $valorLimpo;

            if ($this->PayRecAccounts->save($payRecAccount)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar. Por favor, tente novamente.'));
        }
        $this->set(compact('payRecAccount'));
    }

    public function edit($id = null)
    {
        $payRecAccount = $this->PayRecAccounts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payRecAccount = $this->PayRecAccounts->patchEntity($payRecAccount, $this->request->getData());

            // Limpar o valor antes de salvar
            $valor = $this->request->getData('valor');
            $valorLimpo = str_replace(['R$', '.', ','], ['', '', '.'], $valor);
            $payRecAccount->valor = $valorLimpo;

            if ($this->PayRecAccounts->save($payRecAccount)) {
                $this->Flash->success(__('Alterado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível alterar. Por favor, tente novamente.'));
        }
        $this->set(compact('payRecAccount'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payRecAccount = $this->PayRecAccounts->get($id);
        if ($this->PayRecAccounts->delete($payRecAccount)) {
            $this->Flash->success(__('Excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function getSumByType($table, $conditions, $type)
    {
        $sumQuery = $table->find()
            ->where($conditions)
            ->where(['tipo' => $type])
            ->select([
                'total' => $table->find()->func()->sum('valor')
            ])
            ->first();

        return $sumQuery ? $sumQuery->total : 0;
    }

}
