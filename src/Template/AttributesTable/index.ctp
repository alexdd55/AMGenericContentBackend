<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributesTable[]|\Cake\Collection\CollectionInterface $attributesTable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attributes Table'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Datatypes'), ['controller' => 'Datatypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Datatype'), ['controller' => 'Datatypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attributes'), ['controller' => 'Attributes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attribute'), ['controller' => 'Attributes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attributesTable index large-9 medium-8 columns content">
    <h3><?= __('Attributes Table') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datatype_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attribute_table') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attributesTable as $attributesTable): ?>
            <tr>
                <td><?= $this->Number->format($attributesTable->id) ?></td>
                <td><?= $attributesTable->has('datatype') ? $this->Html->link($attributesTable->datatype->name, ['controller' => 'Datatypes', 'action' => 'view', $attributesTable->datatype->id]) : '' ?></td>
                <td><?= h($attributesTable->attribute_table) ?></td>
                <td><?= h($attributesTable->created) ?></td>
                <td><?= h($attributesTable->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attributesTable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attributesTable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attributesTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributesTable->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
