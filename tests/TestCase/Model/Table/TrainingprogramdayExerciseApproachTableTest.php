<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainingprogramdayExerciseApproachTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainingprogramdayExerciseApproachTable Test Case
 */
class TrainingprogramdayExerciseApproachTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainingprogramdayExerciseApproachTable
     */
    protected $TrainingprogramdayExerciseApproach;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TrainingprogramdayExerciseApproach',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TrainingprogramdayExerciseApproach') ? [] : ['className' => TrainingprogramdayExerciseApproachTable::class];
        $this->TrainingprogramdayExerciseApproach = $this->getTableLocator()->get('TrainingprogramdayExerciseApproach', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TrainingprogramdayExerciseApproach);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrainingprogramdayExerciseApproachTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
