<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foodcategory $foodcategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Foodcategory'), ['action' => 'edit', $foodcategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Foodcategory'), ['action' => 'delete', $foodcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodcategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Foodcategory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Foodcategory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="foodcategory view content">
            <h3><?= h($foodcategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($foodcategory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($foodcategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Owner') ?></th>
                    <td><?= $this->Number->format($foodcategory->owner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $foodcategory->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Food') ?></h4>
                <?php if (!empty($foodcategory->food)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Colories') ?></th>
                            <th><?= __('Hidrocarbonats') ?></th>
                            <th><?= __('Fats') ?></th>
                            <th><?= __('Proteins') ?></th>
                            <th><?= __('Foodcategory Id') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th><?= __('Owner') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($foodcategory->food as $food) : ?>
                        <tr>
                            <td><?= h($food->id) ?></td>
                            <td><?= h($food->name) ?></td>
                            <td><?= h($food->colories) ?></td>
                            <td><?= h($food->hidrocarbonats) ?></td>
                            <td><?= h($food->fats) ?></td>
                            <td><?= h($food->proteins) ?></td>
                            <td><?= h($food->foodcategory_id) ?></td>
                            <td><?= h($food->deleted) ?></td>
                            <td><?= h($food->owner) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Food', 'action' => 'view', $food->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Food', 'action' => 'edit', $food->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Food', 'action' => 'delete', $food->id], ['confirm' => __('Are you sure you want to delete # {0}?', $food->id)]) ?>
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
