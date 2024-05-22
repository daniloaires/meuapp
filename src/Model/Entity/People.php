<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * People Entity
 *
 * @property int $id
 * @property int $tipo
 * @property string $nome
 * @property string|null $email
 * @property string|null $email_sec
 * @property string|null $email_terc
 * @property string|null $rg
 * @property string|null $cpf
 * @property string|null $cnpj
 * @property string|null $inscricao_municipal
 * @property string|null $inscricao_estadual
 * @property string|null $telefone_fixo
 * @property string|null $telefone_celular
 * @property string|null $telefone_comercial
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 */
class People extends Entity
{
    const TIPO_PESSOA_CLIENTE = 1;
    const TIPO_PESSOA_FORNECEDOR = 2;

    const LIST_TIPO_PESSOA = [
        self::TIPO_PESSOA_CLIENTE,
        self::TIPO_PESSOA_FORNECEDOR,
    ];

    const LIST_TIPO_PESSOA_STR = [
        self::TIPO_PESSOA_CLIENTE => 'Cliente',
        self::TIPO_PESSOA_FORNECEDOR => 'Fornecedor',
    ];    

    protected $_accessible = [
        'tipo' => true,
        'nome' => true,
        'email' => true,
        'email_sec' => true,
        'email_terc' => true,
        'rg' => true,
        'cpf' => true,
        'cnpj' => true,
        'inscricao_municipal' => true,
        'inscricao_estadual' => true,
        'telefone_fixo' => true,
        'telefone_celular' => true,
        'telefone_comercial' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
    ];
}
