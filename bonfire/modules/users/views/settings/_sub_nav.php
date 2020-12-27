
<?php if (has_permission('Bonfire.Users.Manage')): ?>
<li class="nav-item has-treeview <?=$this->uri->segment(3)=='users' ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-user"></i>
        <p>Users<i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="<?=site_url(SITE_AREA .'/settings/users') ?>" class="nav-link <?=check_segment(3, 'users')?>">
            <i class="<?=!$this->uri->segment(4) || $this->uri->segment(4)=='index' ?'fa':'far'?> fa-circle nav-icon"></i>
            <p><?php echo lang('bf_action_list').' '. lang('bf_user'); ?></p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?=site_url(SITE_AREA .'/settings/users/create') ?>" class="nav-link <?=check_segment(4, 'create')?>">
            <i class="<?=$this->uri->segment(4)=='create'?'fa':'far'?> fa-circle nav-icon"></i>
            <p><?php echo lang('bf_new') .' '. lang('bf_user'); ?></p>
        </a>
        </li>
    </ul>
</li>
<?php endif;?>