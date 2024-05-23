<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property int|null $estado_civil
 * @property int|null $qtde_filhos
 * @property int|null $sexo
 * @property int|null $nacionalidade
 * @property \Cake\I18n\FrozenDate|null $dt_nascimento
 * @property string|null $funcao
 * @property int|null $sector_id
 * @property int|null $modalidade_contrato
 * @property float|null $remuneracao
 * @property string|null $obs
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Sector $sector
 */
class Employee extends Entity
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
        'cpf' => true,
        'rg' => true,
        'estado_civil' => true,
        'qtde_filhos' => true,
        'sexo' => true,
        'nacionalidade' => true,
        'dt_nascimento' => true,
        'funcao' => true,
        'sector_id' => true,
        'modalidade_contrato' => true,
        'remuneracao' => true,
        'obs' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'sector' => true,
    ];
}
