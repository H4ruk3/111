<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainingprogramdayExercise $trainingprogramdayExercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Trainingprogramday Exercise'), ['action' => 'edit', $trainingprogramdayExercise->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Trainingprogramday Exercise'), ['action' => 'delete', $trainingprogramdayExercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogramdayExercise->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trainingprogramday Exercise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Trainingprogramday Exercise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogramdayExercise view content">
            <h3><?= h($trainingprogramdayExercise->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExercise->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trainingprogramday Id') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExercise->trainingprogramday_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Exercise Id') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExercise->exercise_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $this->Number->format($trainingprogramdayExercise->position) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($trainingprogramdayExercise->comment)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
