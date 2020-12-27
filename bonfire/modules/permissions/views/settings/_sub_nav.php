<?php

$testSegment = $this->uri->segment(4);
$settingsUrl = site_url(SITE_AREA . '/settings');

?>
<div class='nav-scroller bg-white shadow-sm' id='sidebar'> 
<ul class='nav nav-underline justify-content-end px-4'>
	<li<?php echo $testSegment == '' ? ' class="active"' : '' ?>>
		<a class="nav-link" href='<?php echo "{$settingsUrl}/permissions"; ?>'><?php echo lang('bf_action_list'); ?></a>
	</li>
	<li<?php echo $testSegment == 'create' ? ' class="active"' : '' ?>>
		<a class="nav-link" href='<?php echo "{$settingsUrl}/permissions/create"; ?>' id="create_new"><?php echo lang('bf_action_create'); ?></a>
	</li>
	<li>
		<a class="nav-link" href='<?php echo "{$settingsUrl}/roles/permission_matrix"; ?>'><?php echo lang('permissions_matrix'); ?></a>
	</li>
</ul>
</div>