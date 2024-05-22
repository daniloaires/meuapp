<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressesPeoplesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressesPeoplesTable Test Case
 */
class AddressesPeoplesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressesPeoplesTable
     */
    protected $AddressesPeoples;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AddressesPeoples',
        'app.Peoples',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AddressesPeoples') ? [] : ['className' => AddressesPeoplesTable::class];
        $this->AddressesPeoples = $this->getTableLocator()->get('AddressesPeoples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AddressesPeoples);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AddressesPeoplesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AddressesPeoplesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
