<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountsPayableReceivableTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountsPayableReceivableTable Test Case
 */
class AccountsPayableReceivableTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountsPayableReceivableTable
     */
    protected $AccountsPayableReceivable;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AccountsPayableReceivable',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AccountsPayableReceivable') ? [] : ['className' => AccountsPayableReceivableTable::class];
        $this->AccountsPayableReceivable = $this->getTableLocator()->get('AccountsPayableReceivable', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AccountsPayableReceivable);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AccountsPayableReceivableTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
