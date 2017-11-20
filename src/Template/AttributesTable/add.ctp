<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributesTable $attributesTable
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Attributes Table'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Datatypes'), ['controller' => 'Datatypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Datatype'), ['controller' => 'Datatypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attributes'), ['controller' => 'Attributes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attribute'), ['controller' => 'Attributes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attributesTable form large-9 medium-8 columns content">
    <?= $this->Form->create($attributesTable) ?>
    <fieldset>
        <legend><?= __('Add Attributes Table') ?></legend>
        <?php
            echo $this->Form->control('datatype_id', ['options' => $datatypes, 'empty' => true]);
            echo $this->Form->control('attribute_table');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
