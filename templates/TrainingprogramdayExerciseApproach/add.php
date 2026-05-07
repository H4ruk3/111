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
            <?= $this->Html->link(__('List Trainingprogramday Exercise Approach'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogramdayExerciseApproach form content">
            <?= $this->Form->create($trainingprogramdayExerciseApproach) ?>
            <fieldset>
                <legend><?= __('Add Trainingprogramday Exercise Approach') ?></legend>
                <?php
                    echo $this->Form->control('id_trainingprogramday_exercise');
                    echo $this->Form->control('approach');
                    echo $this->Form->control('repeat');
                    echo $this->Form->control('weight');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
