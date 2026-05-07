<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise $exercise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exercise'), ['action' => 'edit', $exercise->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exercise'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exercise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exercise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exercise view content">
            <h3><?= h($exercise->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($exercise->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($exercise->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Img') ?></th>
                    <td><?= h($exercise->img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Video') ?></th>
                    <td><?= h($exercise->video) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exercise->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner') ?></th>
                    <td><?= $this->Number->format($exercise->owner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $this->Number->format($exercise->level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $exercise->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Musculgroup') ?></h4>
                <?php if (!empty($exercise->musculgroup)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th><?= __('Owner') ?></th>
                            <th><?= __('Dictionary Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exercise->musculgroup as $musculgroup) : ?>
                        <tr>
                            <td><?= h($musculgroup->id) ?></td>
                            <td><?= h($musculgroup->name) ?></td>
                            <td><?= h($musculgroup->deleted) ?></td>
                            <td><?= h($musculgroup->owner) ?></td>
                            <td><?= h($musculgroup->dictionary_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Musculgroup', 'action' => 'view', $musculgroup->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Musculgroup', 'action' => 'edit', $musculgroup->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Musculgroup', 'action' => 'delete', $musculgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musculgroup->id)]) ?>
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
