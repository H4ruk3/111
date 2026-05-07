<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trainingprogram[]|\Cake\Collection\CollectionInterface $trainingprogram
 */
?>
<div class="trainingprogram index content">
    <?= $this->Html->link(__('New Trainingprogram'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trainingprogram') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('templtae_id') ?></th>
                    <th><?= $this->Paginator->sort('creator') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('aimTrain') ?></th>
                    <th><?= $this->Paginator->sort('lastmodified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trainingprogram as $trainingprogram): ?>
                <tr>
                    <td><?= $this->Number->format($trainingprogram->id) ?></td>
                    <td><?= h($trainingprogram->name) ?></td>
                    <td><?= $trainingprogram->has('user') ? $this->Html->link($trainingprogram->user->id, ['controller' => 'Users', 'action' => 'view', $trainingprogram->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($trainingprogram->templtae_id) ?></td>
                    <td><?= $this->Number->format($trainingprogram->creator) ?></td>
                    <td><?= h($trainingprogram->active) ?></td>
                    <td><?= $this->Number->format($trainingprogram->aimTrain) ?></td>
                    <td><?= h($trainingprogram->lastmodified) ?></td>
                    <td><?= h($trainingprogram->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trainingprogram->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainingprogram->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainingprogram->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogram->id)]) ?>
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
