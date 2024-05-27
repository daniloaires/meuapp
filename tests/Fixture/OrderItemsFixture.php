<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderItemsFixture
 */
class OrderItemsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'order_id' => 1,
                'product_id' => 1,
                'qtde' => 1,
                'valor' => 1,
                'created' => '2024-05-27 15:43:34',
                'modified' => '2024-05-27 15:43:34',
                'deleted' => '2024-05-27 15:43:34',
            ],
        ];
        parent::init();
    }
}
