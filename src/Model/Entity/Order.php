<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Order extends Entity
{
    const STATUS_PEDIDO_NAO_PAGO = 1;
    const STATUS_PEDIDO_PAGO = 2;

    const LIST_PEDIDO_CONTA = [
        self::STATUS_PEDIDO_NAO_PAGO,
        self::STATUS_PEDIDO_PAGO,
    ];    

    const LIST_STATUS_PEDIDO_STR = [
        self::STATUS_PEDIDO_NAO_PAGO => 'Não Pago',
        self::STATUS_PEDIDO_PAGO => 'Pago',
    ];  

    protected $_accessible = [
        'nome' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'order_items' => true,
    ];
}
