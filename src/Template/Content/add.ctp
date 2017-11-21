<?php echo $this->element('layout/add_header', ['title' => 'Add '.$model]); ?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $model ?></h3>
        </div>
        <div class="form">
            <div class="box-body">

                <div class="x_content form-group">
                    <br/>
                    <?= $this->Form->create($content, [
                        'role' => 'form',
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'form'
                    ]) ?>

                    <?php
                    echo $this->Form->hidden('project_id', [
                        'value' => $project_id
                    ]);
                    echo $this->Form->hidden('model_id', [
                        'value' => $model_id
                    ]);
                    echo $this->Form->input('name', [
                        'class' => 'form-control'
                    ]);
                    ?>
                    <div class="ln_solid"></div>
                </div>

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