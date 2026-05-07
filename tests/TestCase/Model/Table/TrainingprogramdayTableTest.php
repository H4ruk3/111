<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainingprogramdayTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainingprogramdayTable Test Case
 */
class TrainingprogramdayTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainingprogramdayTable
     */
    protected $Trainingprogramday;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Trainingprogramday',
        'app.Trainingprograms',
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
        $config = $this->getTableLocator()->exists('Trainingprogramday') ? [] : ['className' => TrainingprogramdayTable::class];
        $this->Trainingprogramday = $this->getTableLocator()->get('Trainingprogramday', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Trainingprogramday);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrainingprogramdayTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TrainingprogramdayTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
