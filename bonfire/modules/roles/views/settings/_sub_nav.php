<?php

$testSegment = $this->uri->segment(4);
$rolesUrl = site_url(SITE_AREA . '/settings/roles');

?>
<div class='nav-scroller bg-white shadow-sm' id='sidebar'> 
<ul class='nav nav-underline justify-content-end px-4'>
	<li<?php echo $testSegment == '' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href="<?php echo $rolesUrl; ?>"><?php echo lang('role_roles'); ?></a>
	</li>
	<?php if (has_permission('Bonfire.Roles.Add')) : ?>
	<li<?php echo $testSegment == 'create' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href='<?php echo "{$rolesUrl}/create"; ?>' id='create_new'><?php echo lang('role_new_role'); ?></a>
	</li>
	<?php endif;?>
	<li<?php echo $testSegment == 'permission_matrix' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href='<?php echo "{$rolesUrl}/permission_matrix"; ?>'><?php echo lang('matrix_header'); ?></a>
	</li>
</ul>
</div>
