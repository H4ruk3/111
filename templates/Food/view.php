<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Food $food
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Food'), ['action' => 'edit', $food->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Food'), ['action' => 'delete', $food->id], ['confirm' => __('Are you sure you want to delete # {0}?', $food->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Food'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Food'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="food view content">
            <h3><?= h($food->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($food->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Foodcategory') ?></th>
                    <td><?= $food->has('foodcategory') ? $this->Html->link($food->foodcategory->name, ['controller' => 'Foodcategory', 'action' => 'view', $food->foodcategory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($food->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Colories') ?></th>
                    <td><?= $this->Number->format($food->colories) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hidrocarbonats') ?></th>
                    <td><?= $this->Number->format($food->hidrocarbonats) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fats') ?></th>
                    <td><?= $this->Number->format($food->fats) ?></td>
                </tr>
                <tr>
                    <th><?= __('Proteins') ?></th>
                    <td><?= $this->Number->format($food->proteins) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner') ?></th>
                    <td><?= $this->Number->format($food->owner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $food->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
