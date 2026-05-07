<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciseTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciseTable Test Case
 */
class ExerciseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciseTable
     */
    protected $Exercise;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Exercise',
        'app.Musculgroup',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Exercise') ? [] : ['className' => ExerciseTable::class];
        $this->Exercise = $this->getTableLocator()->get('Exercise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Exercise);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExerciseTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
