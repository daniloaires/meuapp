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
                'created' => '2024-05-27 15:42:30',
                'modified' => '2024-05-27 15:42:30',
                'deleted' => '2024-05-27 15:42:30',
            ],
        ];
        parent::init();
    }
}
