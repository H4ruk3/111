<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiaryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiaryTable Test Case
 */
class DiaryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiaryTable
     */
    protected $Diary;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Diary',
        'app.Trainingprograms',
        'app.Trainingprogramdays',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diary') ? [] : ['className' => DiaryTable::class];
        $this->Diary = $this->getTableLocator()->get('Diary', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Diary);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DiaryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DiaryTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
