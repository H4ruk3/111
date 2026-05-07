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
            <?= $this->Html->link(__('List Foodcategory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="foodcategory form content">
            <?= $this->Form->create($foodcategory) ?>
            <fieldset>
                <legend><?= __('Add Foodcategory') ?></legend>
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
