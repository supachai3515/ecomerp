<?php if (! defined('BASEPATH')) exit ('No direct access allowed');
/*
 | -------------------------------------------------------------------
 | EMAIL CONFING
 | -------------------------------------------------------------------
 | Configuration of outgoing mail server.
 | */ 
	$config['protocol']     = 'smtp';
	$config['smtp_host']    = 'smtp.gmail.com';
	$config['useragent']    = 'PHPMailer';
	$config['smtp_port']    = '587';
	$config['smtp_timeout'] = '30';
	$config['smtp_user']    = '';
	$config['smtp_pass']    = '';
	$config['charset']      = 'utf-8';
	$config['newline']      = '\r\n';
 	$config['mailtype']		= 'html';

 /* End of file email.php */
 /* Location application/config/email.php */
 ?>