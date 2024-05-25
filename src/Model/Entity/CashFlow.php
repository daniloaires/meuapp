<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

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
