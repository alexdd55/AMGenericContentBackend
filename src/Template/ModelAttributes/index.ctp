<?php echo $this->element('layout/index_header', [
    'title' => 'ModelAttributes',
    'project' => false,
    'model' => false
]); ?>
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

                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('model_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('attributes_table_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('sort') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($modelAttributes as $modelAttribute):
                    ?>
                    <tr>
                        <td><?= $this->Number->format($modelAttribute->id) ?></td>
                        <td><?= $modelAttribute->model->project->name ?></td>
                        <td><?= $modelAttribute->model->name ?></td>
                        <td><?= $modelAttribute->attributes_table->name ?></td>
                        <td><?= h($modelAttribute->name) ?></td>
                        <td><?= $this->Number->format($modelAttribute->sort) ?></td>
                        <td><?= h($modelAttribute->created) ?></td>
                        <td><?= h($modelAttribute->modified) ?></td>
                        <td class="actions" style="white-space:nowrap">
                            <?= $this->Html->link(__('Edit'), [
                                'action' => 'edit',
                                $modelAttribute->id
                            ], ['class' => 'btn btn-primary btn-xs']) ?>
                            <?= $this->Form->postLink(__('Delete'), [
                                'action' => 'delete',
                                $modelAttribute->id
                            ], [
                                'confirm' => __('Confirm to delete this entry?'),
                                'class' => 'btn btn-danger btn-xs'
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
    </div>
</div>