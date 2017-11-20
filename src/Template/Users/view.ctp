<div class="page-title">
    <div class="title_left">
        <h3>
            User
            <small><?= __('View') ?></small>
        </h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
            <?= $this->Html->link(__('<i class="fa fa-dashboard"></i> Back'), ['action' => 'index'], ['class' => 'btn btn-success pull-right','escape'=>false]) ?>
        </div>
    </div>
    </div>

<!-- Main content -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>User
                        <small><?= __('View') ?></small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?= $this->Form->create($user, array('role' => 'form')) ?>
                    <div class="box-body">
                        <?php
                                                            echo $this->Form->input('active', ['placeholder' => $user->active, 'disabled' => true]);
                                    echo $this->Form->input('email', ['placeholder' => $user->email, 'disabled' => true]);
                                    echo $this->Form->input('password', ['placeholder' => $user->password, 'disabled' => true]);
                                    echo $this->Form->input('firstname', ['placeholder' => $user->firstname, 'disabled' => true]);
                                    echo $this->Form->input('name', ['placeholder' => $user->name, 'disabled' => true]);
                                    echo $this->Form->input('birthday', ['empty' => true, 'default' => '']);
                                                                        echo $this->Form->input('sex', ['placeholder' => $user->sex, 'disabled' => true]);
                                    echo $this->Form->input('street', ['placeholder' => $user->street, 'disabled' => true]);
                                    echo $this->Form->input('number', ['placeholder' => $user->number, 'disabled' => true]);
                                    echo $this->Form->input('zip', ['placeholder' => $user->zip, 'disabled' => true]);
                                    echo $this->Form->input('city', ['placeholder' => $user->city, 'disabled' => true]);
                                    echo $this->Form->input('push_allowed', ['placeholder' => $user->push_allowed, 'disabled' => true]);
                                    echo $this->Form->input('lastlogin', ['placeholder' => $user->lastlogin, 'disabled' => true]);
                                    echo $this->Form->input('forgot', ['placeholder' => $user->forgot, 'disabled' => true]);
                                    echo $this->Form->input('deleted', ['placeholder' => $user->deleted, 'disabled' => true]);
                                    echo $this->Form->input('invite', ['placeholder' => $user->invite, 'disabled' => true]);
                                    echo $this->Form->input('agreed', ['placeholder' => $user->agreed, 'disabled' => true]);
                                    echo $this->Form->input('agreed_date', ['placeholder' => $user->agreed_date, 'disabled' => true]);
                                    echo $this->Form->input('confirmed', ['placeholder' => $user->confirmed, 'disabled' => true]);
                                echo $this->Form->input('projects._ids', ['options' => $projects]);
                        ?>
                    </div>
                <!-- /.box-body -->
                    <div class="box-footer">
                        <?= $this->Form->button(__('Save')) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>

