<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CashFlowsFixture
 */
class CashFlowsFixture extends TestFixture
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
                'forma_pagto' => 1,
                'data' => '2024-05-25',
                'created' => '2024-05-25 14:17:29',
                'modified' => '2024-05-25 14:17:29',
                'deleted' => '2024-05-25 14:17:29',
            ],
        ];
        parent::init();
    }
}
