<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseMusculgroup $exerciseMusculgroup
 * @var string[]|\Cake\Collection\CollectionInterface $musculgroup
 * @var string[]|\Cake\Collection\CollectionInterface $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exerciseMusculgroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exerciseMusculgroup->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exercise Musculgroup'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exerciseMusculgroup form content">
            <?= $this->Form->create($exerciseMusculgroup) ?>
            <fieldset>
                <legend><?= __('Edit Exercise Musculgroup') ?></legend>
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
