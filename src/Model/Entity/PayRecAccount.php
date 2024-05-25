<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayRecAccount Entity
 *
 * @property int $id
 * @property string $descricao
 * @property float $valor
 * @property int $tipo
 * @property \Cake\I18n\FrozenDate $vencimento
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 */
class PayRecAccount extends Entity
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
        'descricao' => true,
        'valor' => true,
        'tipo' => true,
        'vencimento' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
    ];
}
