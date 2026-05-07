<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise[]|\Cake\Collection\CollectionInterface $exercise
 */
?>
<div class="exercise index content">
    <?= $this->Html->link(__('New Exercise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Exercise') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('img') ?></th>
                    <th><?= $this->Paginator->sort('video') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th><?= $this->Paginator->sort('owner') ?></th>
                    <th><?= $this->Paginator->sort('level') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exercise as $exercise): ?>
                <tr>
                    <td><?= $this->Number->format($exercise->id) ?></td>
                    <td><?= h($exercise->name) ?></td>
                    <td><?= h($exercise->description) ?></td>
                    <td><?= h($exercise->img) ?></td>
                    <td><?= h($exercise->video) ?></td>
                    <td><?= h($exercise->deleted) ?></td>
                    <td><?= $this->Number->format($exercise->owner) ?></td>
                    <td><?= $this->Number->format($exercise->level) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $exercise->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exercise->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?>
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
