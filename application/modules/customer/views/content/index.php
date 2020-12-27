<?php

$num_columns	= 8;
$can_delete	= $this->auth->has_permission('Customer.Content.Delete');
$can_edit		= $this->auth->has_permission('Customer.Content.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
	$num_columns++;
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<div class='row'>
	<div class='col-md-12'>
		<span class='float-right mb-2'>
			
				<button type='button' class='btn btn-sm btn-outline-secondary'><i class="fas fa-download mr-2"></i>Download</button>

				<?php if ($can_delete) { ?>
					<input type='submit' name='delete' id='delete-me' class='btn btn-sm btn-outline-secondary' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('customer_delete_confirm'))); ?>')" />
				<?php } else { ?>
					<button type='button' class='btn btn-sm btn-outline-secondary disabled'>Delete</button>
				<?php } ?>

				<button type='button' onclick="location.href='customer/create'" class='btn btn-sm btn-primary'>Create</button>

			
		</span>
	</div>
</div>

<div class="row justify-content-center">
	<div class='col-md-12'>
		<div class="card card-default elevation-0 border">

			<table class='table table-striped'>
				<thead>
					<tr>
						<?php if ($can_delete && $has_records) : ?>
							<th class='column-check'>
								<div class="icheck-primary d-inline">
									<input type="checkbox" class='check-all' id='check-all' />
									<label for="check-all">
									</label>
								</div>
							</th>
						<?php endif; ?>

						<th><?php echo lang('customer_field_code'); ?></th>
						<th><?php echo lang('customer_field_name'); ?></th>
						<th><?php echo lang('customer_field_phone'); ?></th>
						<th><?php echo lang('customer_field_email'); ?></th>
						<th><?php echo lang('customer_column_created'); ?></th>
						<th><?php echo lang('customer_column_modified'); ?></th>
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
									<td class='column-check'>
										<div class="icheck-primary d-inline">
											<input type="checkbox" id="checkbox_<?= $record->id ?>" name='checked[]' value='<?php echo $record->id; ?>' />
											<label for="checkbox_<?= $record->id ?>">
											</label>
										</div>

									</td>
								<?php endif; ?>

								<?php if ($can_edit) : ?>
									<td><?php echo anchor(SITE_AREA . '/content/customer/edit/' . $record->id, '<span class="fa fa-pencil-square-o"></span> ' .  $record->code); ?></td>
								<?php else : ?>
									<td><?php e($record->code); ?></td>
								<?php endif; ?>
								<td><?php e($record->name); ?></td>
								<td><?php e($record->phone); ?></td>
								<td><?php e($record->email); ?></td>
								<td><?php e(user_time($record->created_on, null, 'j M y')); ?></td>
								<td><?php e(user_time($record->modified_on, null, 'j M y')); ?></td>
							</tr>
						<?php
						endforeach;
					else :
						?>
						<tr>
							<td colspan='<?php echo $num_columns; ?>'><?php echo lang('customer_records_empty'); ?></td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div> 
<?php echo form_close(); ?>