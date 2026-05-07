<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseMusculgroup $exerciseMusculgroup
 * @var \Cake\Collection\CollectionInterface|string[] $musculgroup
 * @var \Cake\Collection\CollectionInterface|string[] $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Exercise Musculgroup'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exerciseMusculgroup form content">
            <?= $this->Form->create($exerciseMusculgroup) ?>
            <fieldset>
                <legend><?= __('Add Exercise Musculgroup') ?></legend>
                <?php
                    echo $this->Form->control('musculgroup_id', ['options' => $musculgroup]);
                    echo $this->Form->control('exercise_id', ['options' => $exercise]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
