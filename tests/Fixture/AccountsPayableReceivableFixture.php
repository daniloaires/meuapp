<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountsPayableReceivableFixture
 */
class AccountsPayableReceivableFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'accounts_payable_receivable';
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
                'created' => '2024-05-25 14:18:18',
                'modified' => '2024-05-25 14:18:18',
                'deleted' => '2024-05-25 14:18:18',
            ],
        ];
        parent::init();
    }
}
