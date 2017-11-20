<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Content</h3>
        </div>
        <div class="form">
            <div class="box-body">

                <?= $this->Form->create($content, [
                    'role' => 'form',
                    'id' => 'form'
                ]) ?>

                <div class="form-group">
                    <?php
                    echo $this->Form->control('project_id', [
                        'options' => $projects,
                        'empty' => true,
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('model_id', [
                        'options' => $models,
                        'empty' => true,
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('name',[
                            'class' => 'form-control'
                    ]);

                    echo $this->element('attributesForms', [
                        'content_id' => $content->id,
                        'attributes' => $attributes
                    ]);
                    ?>
                </div>
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
