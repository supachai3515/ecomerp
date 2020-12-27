<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('print_array'))
{
	function print_array($array)
	{
		echo '<pre>';
        print_r($array);
        echo '</pre>';
	}
}


// in_array recursive multidimensional arrays.
// https://stackoverflow.com/questions/4128323/in-array-and-multidimensional-array/4128377#4128377
if ( ! function_exists('in_array_r'))
{
	function in_array_r($needle, $haystack, $strict = false) 
	{
        foreach($haystack as $item) 
        {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }
}



if ( ! function_exists('array_sort'))
{
	function array_sort($array, $on, $order=SORT_ASC)
	{
	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
	        foreach ($array as $k => $v) {
	            if (is_array($v)) {
	                foreach ($v as $k2 => $v2) {
	                    if ($k2 == $on) {
	                        $sortable_array[$k] = $v2;
	                    }
	                }
	            } else {
	                $sortable_array[$k] = $v;
	            }
	        }

	        switch ($order) {
	            case SORT_ASC:
	                asort($sortable_array);
	            break;
	            case SORT_DESC:
	                arsort($sortable_array);
	            break;
	        }

	        foreach ($sortable_array as $k => $v) {
	            $new_array[$k] = $array[$k];
	        }
	    }

	    return $new_array;
	}
}


?>