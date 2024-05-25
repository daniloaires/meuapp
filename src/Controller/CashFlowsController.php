<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\CashFlow;
use Cake\ORM\TableRegistry;

class CashFlowsController extends AppController
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
        $createdFrom = $this->request->getQuery('created_from');
        $createdTo = $this->request->getQuery('created_to');

        // Set up query conditions
        $conditions = [];
        if (!empty($searchNome)) {
            $conditions['descricao LIKE'] = '%' . $searchNome . '%';
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
        $cashFlowsTable = TableRegistry::getTableLocator()->get('CashFlows');
        $query = $cashFlowsTable->find('all')
            ->where($conditions);

        // Get the sum of the 'valor' field
        $sumQuery = $cashFlowsTable->find();
        $valorTotal = $sumQuery->select([
            'total' => $sumQuery->func()->sum('valor')
        ])
        ->where($conditions)
        ->first()
        ->total;

        $cashFlows = $this->Paginator->paginate($query);

        $this->set(compact('cashFlows', 'valorTotal'));
    }

    public function view($id = null)
    {
        $cashFlow = $this->CashFlows->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cashFlow'));
    }

    public function add()
    {
        $cashFlow = $this->CashFlows->newEmptyEntity();
        if ($this->request->is('post')) {
            $cashFlow = $this->CashFlows->patchEntity($cashFlow, $this->request->getData());
            
            // Limpar o valor antes de salvar
            $valor = $this->request->getData('valor');
            $valorLimpo = str_replace(['R$', '.', ','], ['', '', '.'], $valor);
            $cashFlow->valor = $valorLimpo;
    
            // Se o tipo do caixa for saída, transformar o valor em negativo
            if ($cashFlow->tipo == CashFlow::TIPO_CAIXA_SAIDA) {
                $cashFlow->valor = -$cashFlow->valor;
            }
    
            if ($this->CashFlows->save($cashFlow)) {
                $this->Flash->success(__('The cash flow has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cash flow could not be saved. Please, try again.'));
        }
        $this->set(compact('cashFlow'));
    }
    
    public function edit($id = null)
    {
        $cashFlow = $this->CashFlows->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cashFlow = $this->CashFlows->patchEntity($cashFlow, $this->request->getData());
    
            // Limpar o valor antes de salvar
            $valor = $this->request->getData('valor');
            $valorLimpo = str_replace(['R$', '.', ','], ['', '', '.'], $valor);
            $cashFlow->valor = $valorLimpo;
    
            // Se o tipo do caixa for saída, transformar o valor em negativo
            if ($cashFlow->tipo == CashFlow::TIPO_CAIXA_SAIDA) {
                $cashFlow->valor = -$cashFlow->valor;
            }
    
            if ($this->CashFlows->save($cashFlow)) {
                $this->Flash->success(__('The cash flow has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cash flow could not be saved. Please, try again.'));
        }
        $this->set(compact('cashFlow'));
    }

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
