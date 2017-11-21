<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add User</h3>
        </div>
        <div class="form">
            <div class="box-body">
                <?= $this->Form->create($user, [
                    'role' => 'form',

                    'id' => 'form'
                ]) ?>
                <div class="form-group">
                    <?php
                    echo $this->Form->control('email', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('password', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('firstname', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('name', [
                        'class' => 'form-control'
                    ]);

                    echo $this->Form->control('street', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('number', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('zip', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('city', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('projects._ids', [
                        'options' => $projects,
                        'class' => 'form-control'
                    ]);
                    ?>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>