<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trainingprogram $trainingprogram
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Trainingprogram'), ['action' => 'edit', $trainingprogram->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Trainingprogram'), ['action' => 'delete', $trainingprogram->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogram->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trainingprogram'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Trainingprogram'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trainingprogram view content">
            <h3><?= h($trainingprogram->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($trainingprogram->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $trainingprogram->has('user') ? $this->Html->link($trainingprogram->user->id, ['controller' => 'Users', 'action' => 'view', $trainingprogram->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trainingprogram->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Templtae Id') ?></th>
                    <td><?= $this->Number->format($trainingprogram->templtae_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $this->Number->format($trainingprogram->creator) ?></td>
                </tr>
                <tr>
                    <th><?= __('AimTrain') ?></th>
                    <td><?= $this->Number->format($trainingprogram->aimTrain) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastmodified') ?></th>
                    <td><?= h($trainingprogram->lastmodified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $trainingprogram->active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $trainingprogram->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Trainingprogramday') ?></h4>
                <?php if (!empty($trainingprogram->trainingprogramday)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Number') ?></th>
                            <th><?= __('Trainingprogram Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($trainingprogram->trainingprogramday as $trainingprogramday) : ?>
                        <tr>
                            <td><?= h($trainingprogramday->id) ?></td>
                            <td><?= h($trainingprogramday->number) ?></td>
                            <td><?= h($trainingprogramday->trainingprogram_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Trainingprogramday', 'action' => 'view', $trainingprogramday->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Trainingprogramday', 'action' => 'edit', $trainingprogramday->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trainingprogramday', 'action' => 'delete', $trainingprogramday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trainingprogramday->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
