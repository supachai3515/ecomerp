<?php

$checkSegment = $this->uri->segment(4);
$logsUrl = site_url(SITE_AREA . '/developer/logs');

?>
<div class='nav-scroller bg-white shadow-sm' id='sidebar'> 
<ul class='nav nav-underline justify-content-end px-4'>
	<li<?php echo $checkSegment != 'settings' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href="<?php echo $logsUrl; ?>"><?php echo lang('logs_logs'); ?></a>
	</li>
	<li<?php echo $checkSegment == 'settings' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href='<?php echo "{$logsUrl}/settings"; ?>'><?php echo lang('logs_settings'); ?></a>
	</li>
</ul>
</div>