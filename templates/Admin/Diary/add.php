<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary $diary
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diary'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diary form content">
            <?= $this->Form->create($diary) ?>
            <fieldset>
                <legend><?= __('Add Diary') ?></legend>
                <?php
                    echo $this->Form->control('date', ['empty' => true]);
                    echo $this->Form->control('mark');
                    echo $this->Form->control('filled');
                    echo $this->Form->control('checked');
                    echo $this->Form->control('trainingprogram_id');
                    echo $this->Form->control('trainingprogramday_id');
                    echo $this->Form->control('users_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
