<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseMusculgroup $exerciseMusculgroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exercise Musculgroup'), ['action' => 'edit', $exerciseMusculgroup->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exercise Musculgroup'), ['action' => 'delete', $exerciseMusculgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciseMusculgroup->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exercise Musculgroup'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exercise Musculgroup'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exerciseMusculgroup view content">
            <h3><?= h($exerciseMusculgroup->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Musculgroup') ?></th>
                    <td><?= $exerciseMusculgroup->has('musculgroup') ? $this->Html->link($exerciseMusculgroup->musculgroup->name, ['controller' => 'Musculgroup', 'action' => 'view', $exerciseMusculgroup->musculgroup->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Exercise') ?></th>
                    <td><?= $exerciseMusculgroup->has('exercise') ? $this->Html->link($exerciseMusculgroup->exercise->name, ['controller' => 'Exercise', 'action' => 'view', $exerciseMusculgroup->exercise->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exerciseMusculgroup->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
