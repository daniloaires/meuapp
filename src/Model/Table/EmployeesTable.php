<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\SectorsTable&\Cake\ORM\Association\BelongsTo $Sectors
 * @property \App\Model\Table\AddressesEmployeesTable&\Cake\ORM\Association\HasMany $AddressesEmployees
 *
 * @method \App\Model\Entity\Employee newEmptyEntity()
 * @method \App\Model\Entity\Employee newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeesTable extends Table
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

        $this->setTable('employees');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('AddressesEmployees', [
            'foreignKey' => 'employee_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 14)
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf');

        $validator
            ->scalar('rg')
            ->maxLength('rg', 20)
            ->requirePresence('rg', 'create')
            ->notEmptyString('rg');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('email_sec')
            ->maxLength('email_sec', 255)
            ->allowEmptyString('email_sec');

        $validator
            ->integer('estado_civil')
            ->allowEmptyString('estado_civil');

        $validator
            ->integer('qtde_filhos')
            ->requirePresence('qtde_filhos', 'create')
            ->notEmptyString('qtde_filhos');

        $validator
            ->integer('sexo')
            ->requirePresence('sexo', 'create')
            ->notEmptyString('sexo');

        $validator
            ->scalar('telefone_fixo')
            ->maxLength('telefone_fixo', 20)
            ->allowEmptyString('telefone_fixo');

        $validator
            ->scalar('telefone_celular')
            ->maxLength('telefone_celular', 20)
            ->allowEmptyString('telefone_celular');

        $validator
            ->scalar('telefone_comercial')
            ->maxLength('telefone_comercial', 20)
            ->allowEmptyString('telefone_comercial');

        $validator
            ->integer('nacionalidade')
            ->requirePresence('nacionalidade', 'create')
            ->notEmptyString('nacionalidade');

        $validator
            ->date('dt_nascimento')
            ->requirePresence('dt_nascimento', 'create')
            ->notEmptyDate('dt_nascimento');

        $validator
            ->scalar('funcao')
            ->maxLength('funcao', 255)
            ->requirePresence('funcao', 'create')
            ->notEmptyString('funcao');

        $validator
            ->integer('sector_id')
            ->notEmptyString('sector_id');

        $validator
            ->integer('modalidade_contrato')
            ->requirePresence('modalidade_contrato', 'create')
            ->notEmptyString('modalidade_contrato');

        $validator
            ->numeric('remuneracao')
            ->requirePresence('remuneracao', 'create')
            ->notEmptyString('remuneracao');

        $validator
            ->scalar('obs')
            ->allowEmptyString('obs');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('sector_id', 'Sectors'), ['errorField' => 'sector_id']);

        return $rules;
    }
}
