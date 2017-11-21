<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="<?php echo $this->Url->build('/users/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <?php foreach ($projectstructure as $p) { ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-stack-overflow"></i> <span><?= $p->name; ?></span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <?php foreach ($p->models as $m) { ?>
                    <li>
                        <a href="<?php echo $this->Url->build('/'); ?>">
                            <i class="fa <?= $m->fa_icon ?>"></i><?= $m->name ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>

    <?php } ?>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/users'); ?>"><i class="fa fa-user-circle"></i>Users</a></li>
            <li><a href="<?php echo $this->Url->build('/projects'); ?>"><i class="fa fa-stack-overflow"></i>
                    Projects</a></li>
        </ul>
    </li>
</ul>
