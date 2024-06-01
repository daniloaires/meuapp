<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Order extends Entity
{
    const STATUS_PEDIDO_ABERTO = 1;
    const STATUS_PEDIDO_FECHADO = 2;

    const LIST_PEDIDO_CONTA = [
        self::STATUS_PEDIDO_ABERTO,
        self::STATUS_PEDIDO_FECHADO,
    ];    

    const LIST_STATUS_PEDIDO_STR = [
        self::STATUS_PEDIDO_ABERTO => 'Aberto',
        self::STATUS_PEDIDO_FECHADO => 'Fechado',
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
