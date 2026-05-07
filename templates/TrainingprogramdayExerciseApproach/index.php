<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TrainingprogramdayExerciseApproach[]|\Cake\Collection\CollectionInterface $trainingprogramdayExerciseApproach
 */
?>
<div class="trainingprogramdayExerciseApproach index content">
    <?= $this->Html->link(__('New Trainingprogramday Exercise Approach'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trainingprogramday Exercise Approach') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_trainingprogramday_exercise') ?></th>
                    <th><?= $this->Paginator->sort('approach') ?></th>
                    <th><?= $this->Paginator->sort('repeat') ?></th>
                    <th><?= $this->Paginator->sort('weight') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trainingprogramdayExerciseApproach as $trainingprogramdayExerciseApproach): ?>
                <tr>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->id) ?></td>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->id_trainingprogramday_exercise) ?></td>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->approach) ?></td>
                    <td><?= $this->Number->format($trainingprogramdayExerciseApproach->repeat) ?></td>
                    <td><?= h($trainingprogramdayExerciseApproach->weight) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trainingprogramdayExerciseApproach->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trainingprogramdayExerciseApproach->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trainingprogramdayExerciseApproach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogramdayExerciseApproach->id)]) ?>
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
