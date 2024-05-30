<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $codigo
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
 *
 * @property \App\Model\Entity\OrderItem[] $order_items
 */
class Product extends Entity
{
    const UNIDADE = 1;
    const PACOTE = 2;
    const CAIXA = 3;
    const GRAMA = 4;
    const QUILOGRAMA = 5;
    const LITRO = 6;
    const MILILITRO = 7;
    const METRO_CUBICO = 8;
    const METRO = 9;
    const CENTIMETRO = 10;
    const MILIMETRO = 11;
    const METRO_QUADRADO = 12;
    const HECTARE = 13;
    const HORA = 14;
    const MINUTO = 15;
    const PAR = 16;
    const DUZIA = 17;
    const CENTO = 18;
    const MILHEIRO = 19;

    const LIST_UNIDADES = [
        self::UNIDADE,
        self::PACOTE,
        self::CAIXA,
        self::GRAMA,
        self::QUILOGRAMA,
        self::LITRO,
        self::MILILITRO,
        self::METRO_CUBICO,
        self::METRO,
        self::CENTIMETRO,
        self::MILIMETRO,
        self::METRO_QUADRADO,
        self::HECTARE,
        self::HORA,
        self::MINUTO,
        self::PAR,
        self::DUZIA,
        self::CENTO,
        self::MILHEIRO,
    ];

    const LIST_UNIDADES_STR = [
        self::UNIDADE => 'Unidade',
        self::PACOTE => 'Pacote',
        self::CAIXA => 'Caixa',
        self::GRAMA => 'Grama',
        self::QUILOGRAMA => 'Quilograma',
        self::LITRO => 'Litro',
        self::MILILITRO => 'Mililitro',
        self::METRO_CUBICO => 'Metro cúbico',
        self::METRO => 'Metro',
        self::CENTIMETRO => 'Centímetro',
        self::MILIMETRO => 'Milímetro',
        self::METRO_QUADRADO => 'Metro quadrado',
        self::HECTARE => 'Hectare',
        self::HORA => 'Hora',
        self::MINUTO => 'Minuto',
        self::PAR => 'Par',
        self::DUZIA => 'Dúzia',
        self::CENTO => 'Cento',
        self::MILHEIRO => 'Milheiro',
    ];

    protected $_accessible = [
        'codigo' => true,
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
        'order_items' => true,
    ];
}
