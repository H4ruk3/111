<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trainingprogram $trainingprogram
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trainingprogram->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogram->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Trainingprogram'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogram form content">
            <?= $this->Form->create($trainingprogram) ?>
            <fieldset>
                <legend><?= __('Edit Trainingprogram') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('users_id', ['options' => $users]);
                    echo $this->Form->control('templtae_id');
                    echo $this->Form->control('creator');
                    echo $this->Form->control('active');
                    echo $this->Form->control('aimTrain');
                    echo $this->Form->control('lastmodified', ['empty' => true]);
                    echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
