<?php
$num_columns	= 7;
$can_delete	= $this->auth->has_permission('Api.Developer.Delete');
$can_edit		= $this->auth->has_permission('Api.Developer.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
	$num_columns++;
}
?>
<div class='admin-box'>

	<?php echo form_open($this->uri->uri_string()); ?>
	<div class='row mb-4'>
		<div class='col-md-12'>
			<h3>Developer <?php echo lang('api_area_title'); ?>
				<span class='float-right'>
					<div class='btn' role='group' aria-label='Button group with nested dropdown'>
						<button type='button' class='btn btn-sm btn-outline-secondary fa fa-cog'></button>
						<button type='button' class='btn btn-sm btn-outline-secondary fa fa-download'></button>

						<?php if ($can_delete) { ?>
							<input type='submit' name='delete' id='delete-me' class='btn btn-sm btn-outline-secondary' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('api_delete_confirm'))); ?>')" />
						<?php } else { ?>
							<button type='button' class='btn btn-sm btn-outline-secondary disabled'>Delete</button>
						<?php } ?>

						<button type='button' onclick="location.href='api/create'" class='btn btn-sm btn-primary'>Create</button>

					</div>
				</span>
			</h3>
			Please refer document and client-library at <a target="_blank" href='https://gitlab.com/vansales/client-api'>https://gitlab.com/vansales/client-api</a>
		</div>
	</div>

	<table class='table table-striped'>
		<thead>
			<tr>
				<?php if ($can_delete && $has_records) : ?>
					<th class='column-check'><input class='check-all' type='checkbox' /></th>
				<?php endif; ?>

				<th><?php echo lang('api_field_user_id'); ?></th> 
				<th><?php echo lang('api_field_key'); ?></th>
				<th><?php echo lang('api_field_level'); ?></th>
				<th><?php echo lang('api_field_ignore_limits'); ?></th>
				<th><?php echo lang('api_field_is_private_key'); ?></th>
				<th><?php echo lang('api_field_ip_addresses'); ?></th>
			</tr>
		</thead>
		<?php if ($has_records) : ?>

		<?php endif; ?>
		<tbody>
			<?php
			if ($has_records) :
				foreach ($records as $record) :
			?>
					<tr>
						<?php if ($can_delete) : ?>
							<td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
						<?php endif; ?>

						<?php if ($can_edit) : ?>
							<td><?php echo anchor(SITE_AREA . '/developer/api/edit/' . $record->id, '<span class="fa fa-pencil-square-o"></span> ' .  $record->user_id); ?></td>
						<?php else : ?>
							<td><?php e($record->user_id); ?></td>
						<?php endif; ?> 
						<td><?php e($record->key); ?></td>
						<td><?php e($record->level); ?></td>
						<td><?php e($record->ignore_limits); ?></td>
						<td><?php e($record->is_private_key); ?></td>
						<td><?php e($record->ip_addresses); ?></td>
					</tr>
				<?php
				endforeach;
			else :
				?>
				<tr>
					<td colspan='<?php echo $num_columns; ?>'><?php echo lang('api_records_empty'); ?></td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<?php
	echo form_close();

	?>
</div>