<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $email
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
 * @property \Cake\I18n\FrozenTime $deleted
 */
class Cliente extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'nome' => true,
        'email' => true,
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