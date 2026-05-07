<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foodcategory $foodcategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foodcategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foodcategory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Foodcategory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="foodcategory form content">
            <?= $this->Form->create($foodcategory) ?>
            <fieldset>
                <legend><?= __('Edit Foodcategory') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('deleted');
                    echo $this->Form->control('owner');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
