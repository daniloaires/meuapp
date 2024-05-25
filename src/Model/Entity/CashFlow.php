<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CashFlow Entity
 *
 * @property int $id
 * @property string $descricao
 * @property float $valor
 * @property int $tipo
 * @property int $forma_pagto
 * @property \Cake\I18n\FrozenDate $data
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 */
class CashFlow extends Entity
{
    const TIPO_CAIXA_ENTRADA = 1;
    const TIPO_CAIXA_SAIDA = 2;

    const LIST_TIPO_CAIXA = [
        self::TIPO_CAIXA_ENTRADA,
        self::TIPO_CAIXA_SAIDA,
    ];

    const LIST_TIPO_CAIXA_STR = [
        self::TIPO_CAIXA_ENTRADA => 'Entrada',
        self::TIPO_CAIXA_SAIDA => 'Saída',
    ];    

    const FORMA_PAGTO_DINHEIRO = 1;
    const FORMA_PAGTO_CARTAO = 2;
    const FORMA_PAGTO_PIX = 3;

    const LIST_FORMA_PAGTO = [
        self::FORMA_PAGTO_DINHEIRO, 
        self::FORMA_PAGTO_CARTAO, 
        self::FORMA_PAGTO_PIX, 
    ];

    const LIST_FORMA_PAGTO_STR = [
        self::FORMA_PAGTO_DINHEIRO => 'Dinheiro', 
        self::FORMA_PAGTO_CARTAO => 'Cartão', 
        self::FORMA_PAGTO_PIX => 'Pix', 
    ];        

    protected $_accessible = [
        'descricao' => true,
        'valor' => true,
        'tipo' => true,
        'forma_pagto' => true,
        'data' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
    ];
}
