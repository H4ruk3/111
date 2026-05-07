<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Food $food
 * @var \Cake\Collection\CollectionInterface|string[] $foodcategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Food'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="food form content">
            <?= $this->Form->create($food) ?>
            <fieldset>
                <legend><?= __('Add Food') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('colories');
                    echo $this->Form->control('hidrocarbonats');
                    echo $this->Form->control('fats');
                    echo $this->Form->control('proteins');
                    echo $this->Form->control('foodcategory_id', ['options' => $foodcategory]);
                    echo $this->Form->control('deleted');
                    echo $this->Form->control('owner');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
