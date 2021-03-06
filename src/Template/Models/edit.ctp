<?php echo $this->element('layout/edit_header', ['title' => 'Edit Model']); ?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Model</h3>
        </div>
        <div class="form">
            <div class="box-body">
                <div class="x_content form-group">
                    <?= $this->Form->create($model, [
                        'role' => 'form',
                        'id' => 'form'
                    ]) ?>

                    <?php
                    echo $this->Form->control('project_id', [
                        'options' => $projects,
                        'empty' => true,
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('name', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('fa_icon', [
                        'class' => 'form-control'
                    ]);
                    ?>
                </div>
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