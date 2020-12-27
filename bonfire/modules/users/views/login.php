<?php
	$site_open = $this->settings_lib->item('auth.allow_register');
?>

<div class="card-body login-card-body">
	  <p class="login-box-msg">Sign in to start your session</p>
	  <?php echo Template::message(); ?>

      <?php echo form_open(LOGIN_URL, array('autocomplete' => 'off')); ?>
        <div class="input-group mb-3">
		<input type="text" class="form-control" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />	
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
		<input type="password" class="form-control" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
			<?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
				<input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
				<label for="remember_me">
					Remember Me
				</label>
			<?php endif; ?>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
			<input class="btn btn-primary btn-block" type="submit" name="log-me-in" id="submit" value="<?php e(lang('us_let_me_in')); ?>" tabindex="5" />
          </div>
          <!-- /.col -->
        </div>
		<?php echo form_close(); ?>
      <!-- /.social-auth-links -->

      <p class="mb-1">
	  	<?php echo anchor('/forgot_password', lang('us_forgot_your_password')); ?>
      </p>
      <p class="mb-0">
		<?php if ( $site_open ) : ?>
			<?php echo anchor(REGISTER_URL, lang('us_sign_up')); ?>
		<?php endif; ?>
	  </p>
	  
	  <p class="mt-2">
	  <?php // show for Email Activation (1) only
		if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
		<!-- Activation Block -->
				<p style="text-align: left" class="well">
					<?php echo lang('bf_login_activate_title'); ?><br />
					<?php
					$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
					$activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
					echo $activate_str; ?>
				</p>
		<?php endif; ?>
	  </p>
    </div>