<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OrderItems', [
            'foreignKey' => 'product_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('codigo')
            ->maxLength('codigo', 255)
            ->allowEmptyString('codigo');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->numeric('valor_compra')
            ->requirePresence('valor_compra', 'create')
            ->notEmptyString('valor_compra');

        $validator
            ->numeric('valor_venda')
            ->requirePresence('valor_venda', 'create')
            ->notEmptyString('valor_venda');

        $validator
            ->numeric('valor_locacao')
            ->requirePresence('valor_locacao', 'create')
            ->notEmptyString('valor_locacao');

        $validator
            ->numeric('estoque_min')
            ->requirePresence('estoque_min', 'create')
            ->notEmptyString('estoque_min');

        $validator
            ->numeric('estoque')
            ->requirePresence('estoque', 'create')
            ->notEmptyString('estoque');

        $validator
            ->numeric('unidade')
            ->requirePresence('unidade', 'create')
            ->notEmptyString('unidade');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 512)
            ->allowEmptyString('foto');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }
}
