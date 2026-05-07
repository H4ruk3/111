<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary $diary
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diary'), ['action' => 'edit', $diary->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diary'), ['action' => 'delete', $diary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diary'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diary'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diary view content">
            <h3><?= h($diary->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $diary->has('user') ? $this->Html->link($diary->user->id, ['controller' => 'Users', 'action' => 'view', $diary->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diary->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mark') ?></th>
                    <td><?= $this->Number->format($diary->mark) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trainingprogram Id') ?></th>
                    <td><?= $this->Number->format($diary->trainingprogram_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Trainingprogramday Id') ?></th>
                    <td><?= $this->Number->format($diary->trainingprogramday_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($diary->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Filled') ?></th>
                    <td><?= $diary->filled ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Checked') ?></th>
                    <td><?= $diary->checked ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
