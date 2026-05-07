<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Food[]|\Cake\Collection\CollectionInterface $food
 */
?>
<div class="food index content">
    <?= $this->Html->link(__('New Food'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Food') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('colories') ?></th>
                    <th><?= $this->Paginator->sort('hidrocarbonats') ?></th>
                    <th><?= $this->Paginator->sort('fats') ?></th>
                    <th><?= $this->Paginator->sort('proteins') ?></th>
                    <th><?= $this->Paginator->sort('foodcategory_id') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th><?= $this->Paginator->sort('owner') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($food as $food): ?>
                <tr>
                    <td><?= $this->Number->format($food->id) ?></td>
                    <td><?= h($food->name) ?></td>
                    <td><?= $this->Number->format($food->colories) ?></td>
                    <td><?= $this->Number->format($food->hidrocarbonats) ?></td>
                    <td><?= $this->Number->format($food->fats) ?></td>
                    <td><?= $this->Number->format($food->proteins) ?></td>
                    <td><?= $food->has('foodcategory') ? $this->Html->link($food->foodcategory->name, ['controller' => 'Foodcategory', 'action' => 'view', $food->foodcategory->id]) : '' ?></td>
                    <td><?= h($food->deleted) ?></td>
                    <td><?= $this->Number->format($food->owner) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $food->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $food->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $food->id], ['confirm' => __('Are you sure you want to delete # {0}?', $food->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
