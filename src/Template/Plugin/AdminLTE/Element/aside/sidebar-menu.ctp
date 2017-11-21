<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="<?php echo $this->Url->build('/users/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <?php foreach ($projectstructure as $p) { ?>
        <li class="treeview">
            <a href="#" data-project="<?= $p->name; ?>">
                <i class="fa <?= $p->fa_icon ?>"></i> <span><?= $p->name; ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <?php foreach ($p->models as $m) { ?>
                    <li>
                        <a data-model="<?= $m->name; ?>"
                           href="<?php echo $this->Url->build('/content/index/' . $p->name . '/' . $m->name); ?>">
                            <i class="fa <?= $m->fa_icon ?>"></i><?= $m->name ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>

    <?php } ?>
    <li class="header">ADMINISTRATION</li>
    <li class="treeview">

    <li>
        <a data-project="Users" href="<?php echo $this->Url->build('/users'); ?>">
            <i class="fa fa-user"></i>
            Users
        </a>
    </li>
    <li>
        <a data-project="Projects" href="<?php echo $this->Url->build('/projects'); ?>">
            <i class="fa fa-stack-overflow"></i>
            Projects
        </a>
    </li>
    <li>
        <a data-project="Models" href="<?php echo $this->Url->build('/models'); ?>">
            <i class="fa fa-simplybuilt"></i>
            Models
        </a>
    </li>
    <li>
        <a data-project="model-attributes" href="<?php echo $this->Url->build('/model-attributes'); ?>">
            <i class="fa fa-bars"></i>
            Model Attributes
        </a>
    </li>

    </li>
</ul>
