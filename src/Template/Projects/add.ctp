<?php echo $this->element('layout/add_header', ['title' => 'Add Project']); ?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Project</h3>
        </div>
        <div class="form">
            <div class="box-body">

                <div class="x_content form-group">
                    <?= $this->Form->create($project, [
                        'role' => 'form',
                        'id' => 'form'
                    ]) ?>

                    <?php
                    echo $this->Form->input('name', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->input('fa_icon', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->input('users._ids', [
                        'options' => $users,
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
