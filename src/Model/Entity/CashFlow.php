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

    const FORMA_PAGTO_DINHEIRO = 1;
    const FORMA_PAGTO_CARTAO_DEBITO = 2;
    const FORMA_PAGTO_CARTAO_CREDITO = 3;
    const FORMA_PAGTO_PIX = 4;
    const FORMA_PAGTO_BOLETO = 5;

    const LIST_FORMA_PAGTO = [
        self::FORMA_PAGTO_DINHEIRO,
        self::FORMA_PAGTO_CARTAO_DEBITO,
        self::FORMA_PAGTO_CARTAO_CREDITO,
        self::FORMA_PAGTO_PIX,
        self::FORMA_PAGTO_BOLETO,
    ];

    const LIST_FORMA_PAGTO_STR = [
        self::FORMA_PAGTO_DINHEIRO => 'Dinheiro',
        self::FORMA_PAGTO_CARTAO_DEBITO => 'Cartão de Débito',
        self::FORMA_PAGTO_CARTAO_CREDITO => 'Cartão de Crédito',
        self::FORMA_PAGTO_PIX => 'Pix',
        self::FORMA_PAGTO_BOLETO => 'Boleto',
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
