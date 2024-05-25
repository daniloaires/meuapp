<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PayRecAccountsFixture
 */
class PayRecAccountsFixture extends TestFixture
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
                'descricao' => 'Lorem ipsum dolor sit amet',
                'valor' => 1,
                'tipo' => 1,
                'vencimento' => '2024-05-25',
                'status' => 1,
                'created' => '2024-05-25 19:27:40',
                'modified' => '2024-05-25 19:27:40',
                'deleted' => '2024-05-25 19:27:40',
            ],
        ];
        parent::init();
    }
}
