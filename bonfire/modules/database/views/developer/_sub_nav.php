<?php

$migrationsSegment = $this->uri->segment(3);
$checkSegment = $this->uri->segment(4);
$developerUrl = site_url(SITE_AREA . '/developer');

?>
<div class="nav-scroller bg-white shadow-sm" id="sidebar"> 
	<ul class='nav nav-underline justify-content-end px-4'>
		<li<?php echo $checkSegment == '' && $migrationsSegment != 'migrations' ? ' class="active"' : ''; ?>>
			<a class="nav-link" href='<?php echo "{$developerUrl}/database"; ?>'><?php echo lang('database_maintenance'); ?></a>
		</li>
		<li<?php echo $checkSegment == 'backups' ? ' class="active"' : ''; ?>>
			<a class="nav-link" href='<?php echo "{$developerUrl}/database/backups"; ?>'><?php echo lang('database_backups'); ?></a>
		</li>
		<li<?php echo $migrationsSegment == 'migrations' ? ' class="active"' : ''; ?>>
			<a class="nav-link" href='<?php echo "{$developerUrl}/migrations"; ?>'><?php echo lang('database_migrations'); ?></a>
		</li>
	</ul>
</div>