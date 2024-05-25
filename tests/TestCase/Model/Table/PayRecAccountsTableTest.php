<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayRecAccountsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayRecAccountsTable Test Case
 */
class PayRecAccountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PayRecAccountsTable
     */
    protected $PayRecAccounts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PayRecAccounts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PayRecAccounts') ? [] : ['className' => PayRecAccountsTable::class];
        $this->PayRecAccounts = $this->getTableLocator()->get('PayRecAccounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PayRecAccounts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PayRecAccountsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
