<?php

if (validation_errors()) :
?>
<div class='alert alert-block alert-danger'>
    <a class='close' data-dismiss='alert'>&times;</a>
    <h4 class='alert-heading'>
        <?php echo lang('api_errors_message'); ?>
    </h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

$id = isset($api->id) ? $api->id : '';

?>
<div class='admin-box d-flex justify-content-center'>
    
    <div class='col-md-9'>
        <div class='card'>
            <div class='card-body'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4>Api Info</h4>
                        <hr>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
                            <fieldset>
                                

            <div class="form-group row">
                <?php echo form_label(lang('api_field_user_id'), 'user_id', array('class' => 'col-4 col-form-label')); ?>
                <div class='col-8'>
                    <input class="form-control<?php echo form_error('user_id') ? ' is-invalid' : ''; ?>" id='user_id' type='text' name='user_id' maxlength='11' value="<?php echo set_value('user_id', isset($api->user_id) ? $api->user_id : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('user_id'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <?php echo form_label(lang('api_field_company_id'), 'company_id', array('class' => 'col-4 col-form-label')); ?>
                <div class='col-8'>
                    <input class="form-control<?php echo form_error('company_id') ? ' is-invalid' : ''; ?>" id='company_id' type='text' name='company_id' maxlength='11' value="<?php echo set_value('company_id', isset($api->company_id) ? $api->company_id : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('company_id'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <?php echo form_label(lang('api_field_key'), 'key', array('class' => 'col-4 col-form-label')); ?>
                <div class='col-8'>
                    <input class="form-control<?php echo form_error('key') ? ' is-invalid' : ''; ?>" id='key' type='text' name='key' maxlength='40' value="<?php echo set_value('key', isset($api->key) ? $api->key : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('key'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <?php echo form_label(lang('api_field_level'), 'level', array('class' => 'col-4 col-form-label')); ?>
                <div class='col-8'>
                    <input class="form-control<?php echo form_error('level') ? ' is-invalid' : ''; ?>" id='level' type='text' name='level' maxlength='2' value="<?php echo set_value('level', isset($api->level) ? $api->level : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('level'); ?></span>
                </div>
            </div>

            <div class="form-group<?php echo form_error('ignore_limits') ? ' error' : ''; ?>">
                <div class='controls'>
                    <label class='checkbox' for='ignore_limits'>
                        <input type='checkbox' id='ignore_limits' name='ignore_limits'  value='1' <?php echo set_checkbox('ignore_limits', 1, isset($api->ignore_limits) && $api->ignore_limits == 1); ?> />
                        <?php echo lang('api_field_ignore_limits'); ?>
                    </label>
                    <span class='help-inline'><?php echo form_error('ignore_limits'); ?></span>
                </div>
            </div>

            <div class="form-group<?php echo form_error('is_private_key') ? ' error' : ''; ?>">
                <div class='controls'>
                    <label class='checkbox' for='is_private_key'>
                        <input type='checkbox' id='is_private_key' name='is_private_key'  value='1' <?php echo set_checkbox('is_private_key', 1, isset($api->is_private_key) && $api->is_private_key == 1); ?> />
                        <?php echo lang('api_field_is_private_key'); ?>
                    </label>
                    <span class='help-inline'><?php echo form_error('is_private_key'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <?php echo form_label(lang('api_field_ip_addresses'), 'ip_addresses', array('class' => 'col-4 col-form-label')); ?>
                <div class='col-8'>
                    <?php echo form_textarea(array('name' => 'ip_addresses', 'id' => 'ip_addresses', 'rows' => '4', 'value' => set_value('ip_addresses', isset($api->ip_addresses) ? $api->ip_addresses : ''))); ?>
                    <span class='help-inline'><?php echo form_error('ip_addresses'); ?></span>
                </div>
            </div>
                            </fieldset>
                            <fieldset class='form-actions mt-2'>
                                <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('api_action_edit'); ?>" />
                                <?php echo lang('bf_or'); ?>
                                <?php echo anchor(SITE_AREA . '/developer/api', lang('api_cancel'), 'class="btn btn-warning"'); ?>
                                
            <?php if ($this->auth->has_permission('Api.Developer.Delete')) : ?>
                <?php echo lang('bf_or'); ?>
                <button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('api_delete_confirm'))); ?>');">
                    <span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('api_delete_record'); ?>
                </button>
            <?php endif; ?>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>