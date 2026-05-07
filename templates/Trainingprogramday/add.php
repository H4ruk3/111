<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trainingprogramday $trainingprogramday
 * @var \Cake\Collection\CollectionInterface|string[] $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Trainingprogramday'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogramday form content">
            <?= $this->Form->create($trainingprogramday) ?>
            <fieldset>
                <legend><?= __('Add Trainingprogramday') ?></legend>
                <?php
                    echo $this->Form->control('number');
                    echo $this->Form->control('trainingprogram_id');
                    echo $this->Form->control('exercise._ids', ['options' => $exercise]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
