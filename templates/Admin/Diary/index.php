<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary[]|\Cake\Collection\CollectionInterface $diary
 */
?>
<div class="diary index content">
    <?= $this->Html->link(__('New Diary'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diary') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('mark') ?></th>
                    <th><?= $this->Paginator->sort('filled') ?></th>
                    <th><?= $this->Paginator->sort('checked') ?></th>
                    <th><?= $this->Paginator->sort('trainingprogram_id') ?></th>
                    <th><?= $this->Paginator->sort('trainingprogramday_id') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diary as $diary): ?>
                <tr>
                    <td><?= $this->Number->format($diary->id) ?></td>
                    <td><?= h($diary->date) ?></td>
                    <td><?= $this->Number->format($diary->mark) ?></td>
                    <td><?= h($diary->filled) ?></td>
                    <td><?= h($diary->checked) ?></td>
                    <td><?= $this->Number->format($diary->trainingprogram_id) ?></td>
                    <td><?= $this->Number->format($diary->trainingprogramday_id) ?></td>
                    <td><?= $diary->has('user') ? $this->Html->link($diary->user->id, ['controller' => 'Users', 'action' => 'view', $diary->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diary->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diary->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id)]) ?>
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
