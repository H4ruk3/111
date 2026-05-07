<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiaryExercise $diaryExercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diary Exercise'), ['action' => 'edit', $diaryExercise->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diary Exercise'), ['action' => 'delete', $diaryExercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryExercise->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diary Exercise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diary Exercise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diaryExercise view content">
            <h3><?= h($diaryExercise->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Diary') ?></th>
                    <td><?= $diaryExercise->has('diary') ? $this->Html->link($diaryExercise->diary->id, ['controller' => 'Diary', 'action' => 'view', $diaryExercise->diary->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Exercise') ?></th>
                    <td><?= $diaryExercise->has('exercise') ? $this->Html->link($diaryExercise->exercise->name, ['controller' => 'Exercise', 'action' => 'view', $diaryExercise->exercise->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diaryExercise->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $this->Number->format($diaryExercise->position) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
