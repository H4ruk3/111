<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainingprogramdayExercise[]|\Cake\Collection\CollectionInterface $trainingprogramdayExercise
 */
?>
<div class="trainingprogramdayExercise index content">
    <?= $this->Html->link(__('New Trainingprogramday Exercise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trainingprogramday Exercise') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('trainingprogramday_id') ?></th>
                    <th><?= $this->Paginator->sort('exercise_id') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trainingprogramdayExercise as $trainingprogramdayExercise): ?>
                <tr>
                    <td><?= $this->Number->format($trainingprogramdayExercise->id) ?></td>
                    <td><?= $this->Number->format($trainingprogramdayExercise->trainingprogramday_id) ?></td>
                    <td><?= $this->Number->format($trainingprogramdayExercise->exercise_id) ?></td>
                    <td><?= $this->Number->format($trainingprogramdayExercise->position) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trainingprogramdayExercise->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainingprogramdayExercise->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainingprogramdayExercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogramdayExercise->id)]) ?>
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
