<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciseMusculgroupTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciseMusculgroupTable Test Case
 */
class ExerciseMusculgroupTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciseMusculgroupTable
     */
    protected $ExerciseMusculgroup;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ExerciseMusculgroup',
        'app.Musculgroup',
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
        $config = $this->getTableLocator()->exists('ExerciseMusculgroup') ? [] : ['className' => ExerciseMusculgroupTable::class];
        $this->ExerciseMusculgroup = $this->getTableLocator()->get('ExerciseMusculgroup', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExerciseMusculgroup);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExerciseMusculgroupTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExerciseMusculgroupTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
