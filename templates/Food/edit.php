<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Food $food
 * @var string[]|\Cake\Collection\CollectionInterface $foodcategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $food->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $food->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Food'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="food form content">
            <?= $this->Form->create($food) ?>
            <fieldset>
                <legend><?= __('Edit Food') ?></legend>
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
