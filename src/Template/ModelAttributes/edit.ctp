<?php echo $this->element('layout/add_header', ['title' => 'Edit Model Attribute']); ?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Model Attribute</h3>
        </div>
        <div class="form">
            <div class="box-body">

                <div class="x_content form-group">
                    <?= $this->Form->create($modelAttribute) ?>
                    <?php
                    echo $this->Form->control('model_id', [
                        'options' => $models,
                        'empty' => true,
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('attributes_table_id', [
                        'options' => $attributesTables,
                        'empty' => true,
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('name', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('sort', [
                        'class' => 'form-control'
                    ]);
                    ?> </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="">
                        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
