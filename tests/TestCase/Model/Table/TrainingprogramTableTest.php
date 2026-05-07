<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainingprogramTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainingprogramTable Test Case
 */
class TrainingprogramTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainingprogramTable
     */
    protected $Trainingprogram;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Trainingprogram',
        'app.Users',
        'app.Templtaes',
        'app.Trainingprogramday',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Trainingprogram') ? [] : ['className' => TrainingprogramTable::class];
        $this->Trainingprogram = $this->getTableLocator()->get('Trainingprogram', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Trainingprogram);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrainingprogramTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TrainingprogramTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
