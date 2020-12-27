<?php

$checkSegment = $this->uri->segment(4);
$baseUrl = site_url(SITE_AREA . '/developer/sysinfo');

?>
<div class='nav-scroller bg-white shadow-sm' id='sidebar'> 
<ul class='nav nav-underline justify-content-end px-4'>
	<li<?php echo $checkSegment == '' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href="<?php echo $baseUrl; ?>"><?php echo lang('sysinfo_system'); ?></a>
	</li>
	<li<?php echo $checkSegment == 'modules' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href='<?php echo "{$baseUrl}/modules"; ?>'><?php echo lang('sysinfo_modules'); ?></a>
	</li>
	<li<?php echo $checkSegment == 'php_info' ? ' class="active"' : ''; ?>>
		<a class="nav-link" href='<?php echo "{$baseUrl}/php_info"; ?>'><?php echo lang('sysinfo_php'); ?></a>
	</li>
</ul>
</div>