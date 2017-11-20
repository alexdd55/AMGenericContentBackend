<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="page-title">
    <div class="title_left">
        <h3>
            User
            <small><?= __('Edit') ?></small>
        </h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
            <?= $this->Html->link(__('<i class="fa fa-dashboard"></i> Back'), ['action' => 'index'], ['class'=>'btn btn-success pull-right','escape'=>false]) ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User
                    <small><?= __('Edit') ?></small>
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
                <br/>
                <?= $this->Form->create($user, array('role' => 'form', 'class' => 'form-horizontal form-label-left', 'id' => 'form')) ?>

                <?php
                                            echo $this->Form->input('active');
                                                        echo $this->Form->input('email');
                                                        echo $this->Form->input('password');
                                                        echo $this->Form->input('firstname');
                                                        echo $this->Form->input('name');
                                                        echo $this->Form->input('birthday', ['empty' => true, 'default' => '']);
                                                        echo $this->Form->input('sex');
                                                        echo $this->Form->input('street');
                                                        echo $this->Form->input('number');
                                                        echo $this->Form->input('zip');
                                                        echo $this->Form->input('city');
                                                        echo $this->Form->input('push_allowed');
                                                        echo $this->Form->input('lastlogin');
                                                        echo $this->Form->input('forgot');
                                                        echo $this->Form->input('deleted');
                                                        echo $this->Form->input('invite');
                                                        echo $this->Form->input('agreed');
                                                        echo $this->Form->input('agreed_date');
                                                        echo $this->Form->input('confirmed');
                                                    echo $this->Form->input('projects._ids', ['options' => $projects]);
                ?>
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