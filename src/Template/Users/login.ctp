<?php
/**
 * Created by PhpStorm.
 * User: alexandermarquardt
 * Date: 20.11.17
 * Time: 13:38
 */
?>
<div class="form">
    <div class="box-body">
        <?php
        echo $this->Form->create('Users', [
            'url' => '/users/login',
            'role' => 'form',
            'id' => 'form'
        ]);
        ?>
        <div class="form-group">
            <?php
            echo $this->Form->control('email', [
                'class' => 'form-control'
            ]);
            echo $this->Form->control('password', [
                'class' => 'form-control'
            ]);
            echo $this->Form->submit('Login', [
                'class' => 'form-control'
            ]); ?>

        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>
