<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DiaryExerciseFixture
 */
class DiaryExerciseFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'diary_exercise';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'diary_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exercise_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'position' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'diaryfk' => ['type' => 'index', 'columns' => ['diary_id'], 'length' => []],
            'exercisefk' => ['type' => 'index', 'columns' => ['exercise_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'exercisefk' => ['type' => 'foreign', 'columns' => ['exercise_id'], 'references' => ['exercise', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'diaryfk' => ['type' => 'foreign', 'columns' => ['diary_id'], 'references' => ['diary', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
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
                'diary_id' => 1,
                'exercise_id' => 1,
                'position' => 1,
            ],
        ];
        parent::init();
    }
}
