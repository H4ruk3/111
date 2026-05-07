<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiaryExercise $diaryExercise
 * @var string[]|\Cake\Collection\CollectionInterface $diary
 * @var string[]|\Cake\Collection\CollectionInterface $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diaryExercise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diaryExercise->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Diary Exercise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diaryExercise form content">
            <?= $this->Form->create($diaryExercise) ?>
            <fieldset>
                <legend><?= __('Edit Diary Exercise') ?></legend>
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
