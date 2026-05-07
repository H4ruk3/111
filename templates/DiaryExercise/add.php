<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiaryExercise $diaryExercise
 * @var \Cake\Collection\CollectionInterface|string[] $diary
 * @var \Cake\Collection\CollectionInterface|string[] $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diary Exercise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diaryExercise form content">
            <?= $this->Form->create($diaryExercise) ?>
            <fieldset>
                <legend><?= __('Add Diary Exercise') ?></legend>
                <?php
                    echo $this->Form->control('diary_id', ['options' => $diary]);
                    echo $this->Form->control('exercise_id', ['options' => $exercise]);
                    echo $this->Form->control('position');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
