<?php
$module_list = ['dashboard', 'loan', 'customer', 'member', 'new_car', 'car_used', 'new_moto', 'moto_used', 'notify'];
?>
<li class="nav-item has-treeview <?= in_array($this->router->fetch_class(), $module_list) || in_array($this->uri->segment(3), $module_list) ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-home"></i>
        <p>
            <?php echo lang('menu_main_menu'); ?>
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url() ?>" class="nav-link <?php echo check_module('dashboard'); ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p><?php echo lang('menu_dashboard'); ?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('member/index') ?>" class="nav-link <?php echo check_module('member'); ?>">
                <i class="nav-icon fas fa-users"></i>
                <p><?php echo lang('menu_member'); ?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('car_used/index') ?>" class="nav-link <?php echo check_module('car_used'); ?>">
                <i class="nav-icon fas fa-car-side"></i>
                <p><?php echo lang('menu_car'); ?></p>

            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('new_car/index') ?>" class="nav-link <?php echo check_module('new_car'); ?>">
                <i class="nav-icon fas fa-car-side"></i>
                <p><?php echo lang('menu_new_car'); ?></p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('moto_used/index') ?>" class="nav-link <?php echo check_module('moto_used'); ?>">
                <i class="nav-icon fas fa-motorcycle"></i>
                <p><?php echo lang('menu_moto'); ?></p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('new_moto/index') ?>" class="nav-link <?php echo check_module('new_moto'); ?>">
                <i class="nav-icon fas fa-motorcycle"></i>
                <p><?php echo lang('menu_new_moto'); ?></p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('loan/index') ?>" class="nav-link <?php echo check_module('loan'); ?>">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p><?php echo lang('menu_load'); ?></p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= site_url('notify') ?>" class="nav-link <?php echo check_module('notify'); ?>">
                <i class="nav-icon fa fa-bullhorn"></i>
                <p><?php echo lang('menu_notification'); ?></p>

            </a>
        </li>
    </ul>
</li>