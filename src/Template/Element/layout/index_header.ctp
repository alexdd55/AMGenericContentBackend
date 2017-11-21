<?php
/**
 * Created by PhpStorm.
 * User: alexandermarquardt
 * Date: 21.11.17
 * Time: 11:42
 */ ?>
<div class="col-xs-12">
    <div class="page-title">
        <div class="title_left">
            <h2>
                <?= $this->Html->link(__('<i class="fa fa-plus"></i>New'), ['action' => 'add', $project, $model], [
                    'class' => 'btn btn-success pull-right',
                    'escape' => false
                ]) ?>
               <?= __($title) ?>
            </h2>
        </div>
    </div>
</div>
