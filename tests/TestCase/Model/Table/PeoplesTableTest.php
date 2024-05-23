<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeoplesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeoplesTable Test Case
 */
class PeoplesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PeoplesTable
     */
    protected $Peoples;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Peoples',
        'app.AddressesPeoples',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Peoples') ? [] : ['className' => PeoplesTable::class];
        $this->Peoples = $this->getTableLocator()->get('Peoples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Peoples);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PeoplesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
