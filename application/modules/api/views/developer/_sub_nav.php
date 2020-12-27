<?php

$checkSegment = $this->uri->segment(4);
$areaUrl = SITE_AREA . '/developer/api';

?>
<div class='nav-scroller bg-white shadow-sm' id='sidebar'>
	<ul class='nav nav-underline justify-content-end px-4'>
		<li<?php echo $checkSegment == '' ? ' class="active"' : ''; ?>>
			<a class="nav-link" href="<?php echo site_url($areaUrl); ?>" id='list'>
				<?php echo lang('api_list'); ?>
			</a>
			</li>
			<?php if ($this->auth->has_permission('Api.Developer.Create')) : ?>
				<li<?php echo $checkSegment == 'create' ? ' class="active"' : ''; ?>>
					<a class="nav-link" href="<?php echo site_url($areaUrl . '/create'); ?>" id='create_new'>
						<?php echo lang('api_new'); ?>
					</a>
					</li>
				<?php endif; ?>
	</ul>
</div>