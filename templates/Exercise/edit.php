<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise $exercise
 * @var string[]|\Cake\Collection\CollectionInterface $musculgroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exercise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exercise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exercise form content">
            <?= $this->Form->create($exercise) ?>
            <fieldset>
                <legend><?= __('Edit Exercise') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('img');
                    echo $this->Form->control('video');
                    echo $this->Form->control('deleted');
                    echo $this->Form->control('owner');
                    echo $this->Form->control('level');
                    echo $this->Form->control('musculgroup._ids', ['options' => $musculgroup]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
