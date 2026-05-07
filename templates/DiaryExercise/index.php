<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiaryExercise[]|\Cake\Collection\CollectionInterface $diaryExercise
 */
?>
<div class="diaryExercise index content">
    <?= $this->Html->link(__('New Diary Exercise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diary Exercise') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('diary_id') ?></th>
                    <th><?= $this->Paginator->sort('exercise_id') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diaryExercise as $diaryExercise): ?>
                <tr>
                    <td><?= $this->Number->format($diaryExercise->id) ?></td>
                    <td><?= $diaryExercise->has('diary') ? $this->Html->link($diaryExercise->diary->id, ['controller' => 'Diary', 'action' => 'view', $diaryExercise->diary->id]) : '' ?></td>
                    <td><?= $diaryExercise->has('exercise') ? $this->Html->link($diaryExercise->exercise->name, ['controller' => 'Exercise', 'action' => 'view', $diaryExercise->exercise->id]) : '' ?></td>
                    <td><?= $this->Number->format($diaryExercise->position) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diaryExercise->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diaryExercise->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diaryExercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryExercise->id)]) ?>
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
