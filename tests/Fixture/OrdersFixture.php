<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2024-05-30 19:02:55',
                'modified' => '2024-05-30 19:02:55',
                'deleted' => '2024-05-30 19:02:55',
            ],
        ];
        parent::init();
    }
}
