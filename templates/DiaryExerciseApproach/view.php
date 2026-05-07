<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiaryExerciseApproach $diaryExerciseApproach
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diary Exercise Approach'), ['action' => 'edit', $diaryExerciseApproach->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diary Exercise Approach'), ['action' => 'delete', $diaryExerciseApproach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryExerciseApproach->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diary Exercise Approach'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diary Exercise Approach'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diaryExerciseApproach view content">
            <h3><?= h($diaryExerciseApproach->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Diary Exercise') ?></th>
                    <td><?= $diaryExerciseApproach->has('diary_exercise') ? $this->Html->link($diaryExerciseApproach->diary_exercise->id, ['controller' => 'DiaryExercise', 'action' => 'view', $diaryExerciseApproach->diary_exercise->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Planweight') ?></th>
                    <td><?= h($diaryExerciseApproach->planweight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diaryExerciseApproach->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approach') ?></th>
                    <td><?= $this->Number->format($diaryExerciseApproach->approach) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weight') ?></th>
                    <td><?= $this->Number->format($diaryExerciseApproach->weight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Repeats') ?></th>
                    <td><?= $this->Number->format($diaryExerciseApproach->repeats) ?></td>
                </tr>
                <tr>
                    <th><?= __('Planrepeats') ?></th>
                    <td><?= $this->Number->format($diaryExerciseApproach->planrepeats) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
