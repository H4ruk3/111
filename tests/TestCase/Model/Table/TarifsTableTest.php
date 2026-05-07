<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TarifsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TarifsTable Test Case
 */
class TarifsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TarifsTable
     */
    protected $Tarifs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tarifs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tarifs') ? [] : ['className' => TarifsTable::class];
        $this->Tarifs = $this->getTableLocator()->get('Tarifs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tarifs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TarifsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
