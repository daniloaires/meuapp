<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class PayRecAccount extends Entity
{
    const CONTA_PAGAR = 1;
    const CONTA_RECEBER = 2;

    const LIST_TIPO_CONTA = [
        self::CONTA_PAGAR,
        self::CONTA_RECEBER,
    ];

    const LIST_TIPO_CONTA_STR = [
        self::CONTA_PAGAR => 'A Pagar',
        self::CONTA_RECEBER => 'A Receber',
    ];

    const STATUS_CONTA_NAO_PAGO = 1;
    const STATUS_CONTA_PAGO = 2;

    const LIST_STATUS_CONTA = [
        self::STATUS_CONTA_NAO_PAGO,
        self::STATUS_CONTA_PAGO,
    ];    

    const LIST_STATUS_CONTA_STR = [
        self::STATUS_CONTA_NAO_PAGO => 'Não Pago',
        self::STATUS_CONTA_PAGO => 'Pago',
    ];    

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
