<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExerciseMusculgroupFixture
 */
class ExerciseMusculgroupFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'exercise_musculgroup';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'musculgroup_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exercise_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'exersice' => ['type' => 'index', 'columns' => ['exercise_id'], 'length' => []],
            'musculgroup' => ['type' => 'index', 'columns' => ['musculgroup_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'musculgroup' => ['type' => 'foreign', 'columns' => ['musculgroup_id'], 'references' => ['musculgroup', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'exersice' => ['type' => 'foreign', 'columns' => ['exercise_id'], 'references' => ['exercise', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'musculgroup_id' => 1,
                'exercise_id' => 1,
            ],
        ];
        parent::init();
    }
}
