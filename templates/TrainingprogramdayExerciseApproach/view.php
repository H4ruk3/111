<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainingprogramdayExerciseApproach $trainingprogramdayExerciseApproach
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Trainingprogramday Exercise Approach'), ['action' => 'edit', $trainingprogramdayExerciseApproach->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Trainingprogramday Exercise Approach'), ['action' => 'delete', $trainingprogramdayExerciseApproach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogramdayExerciseApproach->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trainingprogramday Exercise Approach'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Trainingprogramday Exercise Approach'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogramdayExerciseApproach view content">
            <h3><?= h($trainingprogramdayExerciseApproach->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Weight') ?></th>
                    <td><?= h($trainingprogramdayExerciseApproach->weight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Trainingprogramday Exercise') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->id_trainingprogramday_exercise) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approach') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->approach) ?></td>
                </tr>
                <tr>
                    <th><?= __('Repeat') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->repeat) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
