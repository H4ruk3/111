<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainingprogramdayExerciseTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainingprogramdayExerciseTable Test Case
 */
class TrainingprogramdayExerciseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainingprogramdayExerciseTable
     */
    protected $TrainingprogramdayExercise;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TrainingprogramdayExercise',
        'app.Trainingprogramdays',
        'app.Exercises',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TrainingprogramdayExercise') ? [] : ['className' => TrainingprogramdayExerciseTable::class];
        $this->TrainingprogramdayExercise = $this->getTableLocator()->get('TrainingprogramdayExercise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TrainingprogramdayExercise);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrainingprogramdayExerciseTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TrainingprogramdayExerciseTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
