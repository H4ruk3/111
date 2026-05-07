<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MusculgroupTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MusculgroupTable Test Case
 */
class MusculgroupTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MusculgroupTable
     */
    protected $Musculgroup;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Musculgroup',
        'app.Dictionaries',
        'app.Exercise',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Musculgroup') ? [] : ['className' => MusculgroupTable::class];
        $this->Musculgroup = $this->getTableLocator()->get('Musculgroup', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Musculgroup);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MusculgroupTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MusculgroupTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
