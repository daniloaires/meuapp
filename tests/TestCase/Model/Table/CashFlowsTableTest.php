<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CashFlowsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CashFlowsTable Test Case
 */
class CashFlowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CashFlowsTable
     */
    protected $CashFlows;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CashFlows',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CashFlows') ? [] : ['className' => CashFlowsTable::class];
        $this->CashFlows = $this->getTableLocator()->get('CashFlows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CashFlows);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CashFlowsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
