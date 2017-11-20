<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributesTable $attributesTable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attributes Table'), ['action' => 'edit', $attributesTable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attributes Table'), ['action' => 'delete', $attributesTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributesTable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attributes Table'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attributes Table'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Datatypes'), ['controller' => 'Datatypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Datatype'), ['controller' => 'Datatypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attributes'), ['controller' => 'Attributes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attribute'), ['controller' => 'Attributes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attributesTable view large-9 medium-8 columns content">
    <h3><?= h($attributesTable->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Datatype') ?></th>
            <td><?= $attributesTable->has('datatype') ? $this->Html->link($attributesTable->datatype->name, ['controller' => 'Datatypes', 'action' => 'view', $attributesTable->datatype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Table') ?></th>
            <td><?= h($attributesTable->attribute_table) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attributesTable->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($attributesTable->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($attributesTable->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Attributes') ?></h4>
        <?php if (!empty($attributesTable->attributes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Model Id') ?></th>
                <th scope="col"><?= __('Attributes Table Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attributesTable->attributes as $attributes): ?>
            <tr>
                <td><?= h($attributes->id) ?></td>
                <td><?= h($attributes->model_id) ?></td>
                <td><?= h($attributes->attributes_table_id) ?></td>
                <td><?= h($attributes->name) ?></td>
                <td><?= h($attributes->created) ?></td>
                <td><?= h($attributes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attributes', 'action' => 'view', $attributes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attributes', 'action' => 'edit', $attributes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attributes', 'action' => 'delete', $attributes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
