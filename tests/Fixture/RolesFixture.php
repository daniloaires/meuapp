<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture
 */
class RolesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-05-25 18:47:12',
                'modified' => '2024-05-25 18:47:12',
                'deleted' => '2024-05-25 18:47:12',
            ],
        ];
        parent::init();
    }
}
