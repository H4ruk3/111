<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Musculgroup $musculgroup
 * @var \Cake\Collection\CollectionInterface|string[] $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Musculgroup'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="musculgroup form content">
            <?= $this->Form->create($musculgroup) ?>
            <fieldset>
                <legend><?= __('Add Musculgroup') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('deleted');
                    echo $this->Form->control('owner');
                    echo $this->Form->control('dictionary_id');
                    echo $this->Form->control('exercise._ids', ['options' => $exercise]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
