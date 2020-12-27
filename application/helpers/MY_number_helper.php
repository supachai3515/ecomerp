<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('format_number'))
{
	function format_number($number = '', $decimal = 2, $zero = '-')
	{
		if($number == 0){ return $zero; }

		return ($number === '') ? '' : number_format( (float) $number, $decimal, '.', ',');
	}
}




?>