<?php echo $this->element('layout/index_header', ['title' => 'Projects','project' => false,'model' => false]); ?>
<!-- Main content -->

<div class="col-xs-12">
    <div class="x_panel">
        <!-- /.box-header -->
        <div class="x_content">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <div class="input-group input-group-sm">
                    <input type="text" name="search" class="form-control"
                           placeholder="<?= __('Fill in to start search') ?>">
                    <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
                </span>
                </div>
            </form>
            <table class="table table-hover table-striped">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?= $this->Number->format($project->id) ?></td>
                        <td><?= h($project->name) ?></td>
                        <td><?= h($project->created) ?></td>
                        <td><?= h($project->modified) ?></td>
                        <td class="actions" style="white-space:nowrap">
                            <?= $this->Html->link(__('Edit'), [
                                'action' => 'edit',
                                $project->id
                            ], ['class' => 'btn btn-primary btn-xs']) ?>
                            <?= $this->Form->postLink(__('Delete'), [
                                'action' => 'delete',
                                $project->id
                            ], [
                                'confirm' => __('Confirm to delete this entry?'),
                                'class' => 'btn btn-danger btn-xs'
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <?php echo $this->Paginator->numbers(); ?>
            </ul>
        </div>
    </div>
    <!-- /.box -->
</div>

<!-- /.content -->
