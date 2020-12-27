
<?php 
	$module_list = ['developer'];
?>
<li class="nav-item has-treeview <?=in_array($this->router->fetch_class(), $module_list) ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-tools"></i>
        <p>
        Developer
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="<?=site_url(SITE_AREA .'/developer/builder') ?>" class="nav-link <?=check_segment(2, 'developer')?>">
            <i class="<?=!$this->uri->segment(4)?'fa':'far'?> fa-circle nav-icon"></i>
            <p><?php echo lang('bf_action_list').' '.lang('mb_module'); ?></p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?=site_url(SITE_AREA .'/developer/builder/create_module') ?>" class="nav-link <?=check_segment(4, 'create_module')?>">
            <i class="<?=$this->uri->segment(4)=='create_module'?'fa':'far'?> fa-circle nav-icon"></i>
            <p><?php echo lang('mb_new_module'); ?></p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?=site_url(SITE_AREA .'/developer/builder/create_context')?>" class="nav-link <?=check_segment(4, 'create_context')?>">
            <i class="<?=$this->uri->segment(4)=='create_context'?'fa':'far'?> fa-circle nav-icon"></i>
            <p><?php echo lang('mb_new_context'); ?></p>
        </a>
        </li>
    </ul>
</li>