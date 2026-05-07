<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiaryExerciseApproach $diaryExerciseApproach
 * @var \Cake\Collection\CollectionInterface|string[] $diaryExercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diary Exercise Approach'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diaryExerciseApproach form content">
            <?= $this->Form->create($diaryExerciseApproach) ?>
            <fieldset>
                <legend><?= __('Add Diary Exercise Approach') ?></legend>
                <?php
                    echo $this->Form->control('diaryexercise_id', ['options' => $diaryExercise]);
                    echo $this->Form->control('approach');
                    echo $this->Form->control('weight');
                    echo $this->Form->control('repeats');
                    echo $this->Form->control('planweight');
                    echo $this->Form->control('planrepeats');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
