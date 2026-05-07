<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Musculgroup $musculgroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Musculgroup'), ['action' => 'edit', $musculgroup->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Musculgroup'), ['action' => 'delete', $musculgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musculgroup->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Musculgroup'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Musculgroup'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="musculgroup view content">
            <h3><?= h($musculgroup->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($musculgroup->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($musculgroup->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $this->Number->format($musculgroup->deleted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner') ?></th>
                    <td><?= $this->Number->format($musculgroup->owner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dictionary Id') ?></th>
                    <td><?= $this->Number->format($musculgroup->dictionary_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Exercise') ?></h4>
                <?php if (!empty($musculgroup->exercise)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Img') ?></th>
                            <th><?= __('Video') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th><?= __('Owner') ?></th>
                            <th><?= __('Level') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($musculgroup->exercise as $exercise) : ?>
                        <tr>
                            <td><?= h($exercise->id) ?></td>
                            <td><?= h($exercise->name) ?></td>
                            <td><?= h($exercise->description) ?></td>
                            <td><?= h($exercise->img) ?></td>
                            <td><?= h($exercise->video) ?></td>
                            <td><?= h($exercise->deleted) ?></td>
                            <td><?= h($exercise->owner) ?></td>
                            <td><?= h($exercise->level) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Exercise', 'action' => 'view', $exercise->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Exercise', 'action' => 'edit', $exercise->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exercise', 'action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?>
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
