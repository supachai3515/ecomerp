<?php

$testSegment = $this->uri->segment(4);
$translateUrl = site_url(SITE_AREA . '/developer/translate');

?>
<div class='nav-scroller bg-white shadow-sm' id='sidebar'> 
<ul class='nav nav-underline justify-content-end px-4'>
	<li<?php echo $testSegment == '' ? ' class="active"' : '' ?>>
		<a class="nav-link" href="<?php echo $translateUrl; ?>">
            <?php echo lang('translate_translate'); ?>
        </a>
	</li>
	<li<?php echo $testSegment == 'export' ? ' class="active"' : '' ?>>
		<a class="nav-link" href="<?php echo "{$translateUrl}/export"; ?>">
            <?php echo lang('translate_export_short'); ?>
        </a>
	</li>
</ul>
</div>