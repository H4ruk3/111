<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ExerciseMusculgroupController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ExerciseMusculgroupController Test Case
 *
 * @uses \App\Controller\ExerciseMusculgroupController
 */
class ExerciseMusculgroupControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\ExerciseMusculgroupController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\ExerciseMusculgroupController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\ExerciseMusculgroupController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\ExerciseMusculgroupController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\ExerciseMusculgroupController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
