<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodcategoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodcategoryTable Test Case
 */
class FoodcategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodcategoryTable
     */
    protected $Foodcategory;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Foodcategory',
        'app.Food',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Foodcategory') ? [] : ['className' => FoodcategoryTable::class];
        $this->Foodcategory = $this->getTableLocator()->get('Foodcategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Foodcategory);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FoodcategoryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
