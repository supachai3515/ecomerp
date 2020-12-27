<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('ajax_access'))
{
	function ajax_access($reditect_to = '/')
	{
		if( ! (( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) && isset( $_SERVER['HTTP_X_REQUESTED_WITH'])) )
        {
            redirect( site_url($reditect_to) );
            exit;
        }
	}
}




?>