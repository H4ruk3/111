<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trainingprogramday[]|\Cake\Collection\CollectionInterface $trainingprogramday
 */
?>
<div class="trainingprogramday index content">
    <?= $this->Html->link(__('New Trainingprogramday'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trainingprogramday') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('trainingprogram_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trainingprogramday as $trainingprogramday): ?>
                <tr>
                    <td><?= $this->Number->format($trainingprogramday->id) ?></td>
                    <td><?= $this->Number->format($trainingprogramday->number) ?></td>
                    <td><?= $this->Number->format($trainingprogramday->trainingprogram_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trainingprogramday->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainingprogramday->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainingprogramday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogramday->id)]) ?>
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
