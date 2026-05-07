<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodTable Test Case
 */
class FoodTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodTable
     */
    protected $Food;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Food',
        'app.Foodcategory',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Food') ? [] : ['className' => FoodTable::class];
        $this->Food = $this->getTableLocator()->get('Food', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Food);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FoodTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FoodTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
