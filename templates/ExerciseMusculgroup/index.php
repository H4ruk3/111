<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseMusculgroup[]|\Cake\Collection\CollectionInterface $exerciseMusculgroup
 */
?>
<div class="exerciseMusculgroup index content">
    <?= $this->Html->link(__('New Exercise Musculgroup'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Exercise Musculgroup') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('musculgroup_id') ?></th>
                    <th><?= $this->Paginator->sort('exercise_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exerciseMusculgroup as $exerciseMusculgroup): ?>
                <tr>
                    <td><?= $this->Number->format($exerciseMusculgroup->id) ?></td>
                    <td><?= $exerciseMusculgroup->has('musculgroup') ? $this->Html->link($exerciseMusculgroup->musculgroup->name, ['controller' => 'Musculgroup', 'action' => 'view', $exerciseMusculgroup->musculgroup->id]) : '' ?></td>
                    <td><?= $exerciseMusculgroup->has('exercise') ? $this->Html->link($exerciseMusculgroup->exercise->name, ['controller' => 'Exercise', 'action' => 'view', $exerciseMusculgroup->exercise->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $exerciseMusculgroup->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exerciseMusculgroup->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exerciseMusculgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciseMusculgroup->id)]) ?>
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
