<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property float $valor_compra
 * @property float $valor_venda
 * @property float $valor_locacao
 * @property float $estoque_min
 * @property float $estoque
 * @property float $unidade
 * @property string|null $foto
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 */
class Product extends Entity
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
        'descricao' => true,
        'valor_compra' => true,
        'valor_venda' => true,
        'valor_locacao' => true,
        'estoque_min' => true,
        'estoque' => true,
        'unidade' => true,
        'foto' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
    ];
}
