<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\CashFlow;
use Cake\I18n\Date;
use Cake\I18n\FrozenTime;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CashFlowsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cash_flows');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->integer('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->integer('forma_pagto')
            ->requirePresence('forma_pagto', 'create')
            ->notEmptyString('forma_pagto');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }

    public function movimentacaoCaixa($descricao = null, $valor = null, $tipo = null, $forma_pagto = null) {
        // Verifica se os parâmetros foram fornecidos
        if ($valor === null || $descricao === null || $tipo === null || $forma_pagto === null) {
            return false;
        }

        if ($tipo === CashFlow::TIPO_CAIXA_SAIDA) {
            $valor = -$valor;
        }
    
        // Cria uma nova entidade
        $cashFlow = $this->newEntity([
            'descricao' => $descricao,
            'valor' => $valor,
            'tipo' => $tipo,
            'forma_pagto' => $forma_pagto,
            'data' => FrozenTime::now() // Define a data atual
        ]);

        // Tenta salvar a entidade
        if ($this->save($cashFlow)) {
            return true;
        } else {
            return false;
        }
    }
    
}
