<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarif $tarif
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tarif'), ['action' => 'edit', $tarif->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tarif'), ['action' => 'delete', $tarif->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarif->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tarifs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tarif'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tarifs view content">
            <h3><?= h($tarif->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($tarif->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tarif->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($tarif->price) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($tarif->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
