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
            <?= $this->Html->link(__('List Trainingprogramday Exercise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogramdayExercise form content">
            <?= $this->Form->create($trainingprogramdayExercise) ?>
            <fieldset>
                <legend><?= __('Add Trainingprogramday Exercise') ?></legend>
                <?php
                    echo $this->Form->control('trainingprogramday_id');
                    echo $this->Form->control('exercise_id');
                    echo $this->Form->control('position');
                    echo $this->Form->control('comment');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
