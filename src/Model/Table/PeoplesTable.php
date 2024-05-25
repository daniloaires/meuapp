<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Peoples Model
 *
 * @property \App\Model\Table\AddressesPeoplesTable&\Cake\ORM\Association\HasMany $AddressesPeoples
 *
 * @method \App\Model\Entity\People newEmptyEntity()
 * @method \App\Model\Entity\People newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\People[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\People get($primaryKey, $options = [])
 * @method \App\Model\Entity\People findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\People patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\People[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\People|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\People saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\People[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\People[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\People[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\People[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PeoplesTable extends Table
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

        $this->setTable('peoples');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AddressesPeoples', [
            'foreignKey' => 'people_id',
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
            ->integer('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('email_sec')
            ->maxLength('email_sec', 255)
            ->allowEmptyString('email_sec');

        $validator
            ->scalar('email_terc')
            ->maxLength('email_terc', 255)
            ->allowEmptyString('email_terc');

        $validator
            ->scalar('rg')
            ->maxLength('rg', 20)
            ->allowEmptyString('rg');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 20)
            ->allowEmptyString('cpf');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 40)
            ->allowEmptyString('cnpj');

        $validator
            ->scalar('inscricao_municipal')
            ->maxLength('inscricao_municipal', 40)
            ->allowEmptyString('inscricao_municipal');

        $validator
            ->scalar('inscricao_estadual')
            ->maxLength('inscricao_estadual', 40)
            ->allowEmptyString('inscricao_estadual');

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
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }
}
