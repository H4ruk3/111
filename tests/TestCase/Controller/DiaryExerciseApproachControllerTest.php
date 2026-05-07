<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\DiaryExerciseApproachController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\DiaryExerciseApproachController Test Case
 *
 * @uses \App\Controller\DiaryExerciseApproachController
 */
class DiaryExerciseApproachControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DiaryExerciseApproach',
        'app.DiaryExercise',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\DiaryExerciseApproachController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\DiaryExerciseApproachController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\DiaryExerciseApproachController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\DiaryExerciseApproachController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\DiaryExerciseApproachController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
