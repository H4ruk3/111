<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trainingprogramday $trainingprogramday
 * @var string[]|\Cake\Collection\CollectionInterface $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trainingprogramday->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogramday->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Trainingprogramday'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogramday form content">
            <?= $this->Form->create($trainingprogramday) ?>
            <fieldset>
                <legend><?= __('Edit Trainingprogramday') ?></legend>
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
