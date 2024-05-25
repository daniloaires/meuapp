<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SectorsFixture
 */
class SectorsFixture extends TestFixture
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
                'created' => '2024-05-25 18:47:52',
                'modified' => '2024-05-25 18:47:52',
                'deleted' => '2024-05-25 18:47:52',
            ],
        ];
        parent::init();
    }
}
