<?php

if (validation_errors()) :
?>
    <div class='alert alert-block alert-danger'>
        <a class='close' data-dismiss='alert'>&times;</a>
        <h4 class='alert-heading'>
            <?php echo lang('customer_errors_message'); ?>
        </h4>
        <?php echo validation_errors('<span class="text-light">', '</span>'); ?>
    </div>
<?php
endif;

$id = isset($customer->id) ? $customer->id : '';

?>

<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
<div class="row justify-content-center">
    <div class='col-md-12'>
        <div class="card card-default elevation-0 border">

            <div class="card-header">
                <h3 class="card-title">Customer Info</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>


                            <div class="form-group row">
                                <?php echo form_label(lang('customer_field_code') . lang('bf_form_label_required'), 'code', array('class' => 'col-3 col-form-label')); ?>
                                <div class='col-7'>
                                    <input class="form-control<?php echo form_error('code') ? ' is-invalid' : ''; ?>" id='code' type='text' required='required' name='code' maxlength='20' value="<?php echo set_value('code', isset($customer->code) ? $customer->code : ''); ?>" />
                                    <span class='help-inline'><?php echo form_error('code'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <?php echo form_label(lang('customer_field_name') . lang('bf_form_label_required'), 'name', array('class' => 'col-3 col-form-label')); ?>
                                <div class='col-7'>
                                    <input class="form-control<?php echo form_error('name') ? ' is-invalid' : ''; ?>" id='name' type='text' required='required' name='name' maxlength='150' value="<?php echo set_value('name', isset($customer->name) ? $customer->name : ''); ?>" />
                                    <span class='help-inline'><?php echo form_error('name'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <?php echo form_label(lang('customer_field_organization'), 'name', array('class' => 'col-3 col-form-label')); ?>
                                <div class='col-7'>
                                    <input class="form-control<?php echo form_error('organization') ? ' is-invalid' : ''; ?>" id='name' type='text' name='organization' maxlength='150' value="<?php echo set_value('organization', isset($customer->organization) ? $customer->organization : ''); ?>" />
                                    <span class='help-inline'><?php echo form_error('organization'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <?php echo form_label(lang('customer_field_phone') . lang('bf_form_label_required'), 'phone', array('class' => 'col-3 col-form-label')); ?>
                                <div class='col-7'>
                                    <input class="form-control<?php echo form_error('phone') ? ' is-invalid' : ''; ?>" id='phone' type='text' required='required' name='phone' maxlength='40' value="<?php echo set_value('phone', isset($customer->phone) ? $customer->phone : ''); ?>" />
                                    <span class='help-inline'><?php echo form_error('phone'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <?php echo form_label(lang('customer_field_email'), 'email', array('class' => 'col-3 col-form-label')); ?>
                                <div class='col-7'>
                                    <input class="form-control<?php echo form_error('email') ? ' is-invalid' : ''; ?>" id='email' type='text' name='email' maxlength='40' value="<?php echo set_value('email', isset($customer->email) ? $customer->email : ''); ?>" />
                                    <span class='help-inline'><?php echo form_error('email'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <?php echo form_label(lang('customer_field_address'), 'address', array('class' => 'col-3 col-form-label')); ?>
                                <div class='col-7'>
                                    <?php echo form_textarea(array('name' => 'address', 'id' => 'address', 'rows' => '4', 'value' => set_value('address', isset($customer->address) ? $customer->address : ''))); ?>
                                    <span class='help-inline'><?php echo form_error('address'); ?></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <fieldset class='form-actions mt-2'>
                    <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('customer_action_edit'); ?>" />
                    <?php echo lang('bf_or'); ?>
                    <?php echo anchor(SITE_AREA . '/content/customer', lang('customer_cancel'), 'class="btn btn-warning"'); ?>

                    <?php if ($this->auth->has_permission('Customer.Content.Delete')) : ?>
                        <?php echo lang('bf_or'); ?>
                        <button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('customer_delete_confirm'))); ?>');">
                            <span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('customer_delete_record'); ?>
                        </button>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
