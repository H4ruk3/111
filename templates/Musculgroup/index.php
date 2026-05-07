<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Musculgroup[]|\Cake\Collection\CollectionInterface $musculgroup
 */
?>
<div class="musculgroup index content">
    <?= $this->Html->link(__('New Musculgroup'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Musculgroup') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th><?= $this->Paginator->sort('owner') ?></th>
                    <th><?= $this->Paginator->sort('dictionary_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($musculgroup as $musculgroup): ?>
                <tr>
                    <td><?= $this->Number->format($musculgroup->id) ?></td>
                    <td><?= h($musculgroup->name) ?></td>
                    <td><?= $this->Number->format($musculgroup->deleted) ?></td>
                    <td><?= $this->Number->format($musculgroup->owner) ?></td>
                    <td><?= $this->Number->format($musculgroup->dictionary_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $musculgroup->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $musculgroup->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $musculgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musculgroup->id)]) ?>
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
