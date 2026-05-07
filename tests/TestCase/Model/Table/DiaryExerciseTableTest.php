<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiaryExerciseTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiaryExerciseTable Test Case
 */
class DiaryExerciseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiaryExerciseTable
     */
    protected $DiaryExercise;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DiaryExercise',
        'app.Diary',
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
        $config = $this->getTableLocator()->exists('DiaryExercise') ? [] : ['className' => DiaryExerciseTable::class];
        $this->DiaryExercise = $this->getTableLocator()->get('DiaryExercise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DiaryExercise);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DiaryExerciseTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DiaryExerciseTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
