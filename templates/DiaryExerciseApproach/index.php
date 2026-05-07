<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiaryExerciseApproach[]|\Cake\Collection\CollectionInterface $diaryExerciseApproach
 */
?>
<div class="diaryExerciseApproach index content">
    <?= $this->Html->link(__('New Diary Exercise Approach'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diary Exercise Approach') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('diaryexercise_id') ?></th>
                    <th><?= $this->Paginator->sort('approach') ?></th>
                    <th><?= $this->Paginator->sort('weight') ?></th>
                    <th><?= $this->Paginator->sort('repeats') ?></th>
                    <th><?= $this->Paginator->sort('planweight') ?></th>
                    <th><?= $this->Paginator->sort('planrepeats') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diaryExerciseApproach as $diaryExerciseApproach): ?>
                <tr>
                    <td><?= $this->Number->format($diaryExerciseApproach->id) ?></td>
                    <td><?= $diaryExerciseApproach->has('diary_exercise') ? $this->Html->link($diaryExerciseApproach->diary_exercise->id, ['controller' => 'DiaryExercise', 'action' => 'view', $diaryExerciseApproach->diary_exercise->id]) : '' ?></td>
                    <td><?= $this->Number->format($diaryExerciseApproach->approach) ?></td>
                    <td><?= $this->Number->format($diaryExerciseApproach->weight) ?></td>
                    <td><?= $this->Number->format($diaryExerciseApproach->repeats) ?></td>
                    <td><?= h($diaryExerciseApproach->planweight) ?></td>
                    <td><?= $this->Number->format($diaryExerciseApproach->planrepeats) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diaryExerciseApproach->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diaryExerciseApproach->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diaryExerciseApproach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryExerciseApproach->id)]) ?>
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
