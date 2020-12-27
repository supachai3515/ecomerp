<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mybreadcrumb {

	private $breadcrumbs = array();
	private $tags = "";
	
	function __construct()
	{
		$this->tags = array(
			'open' 		=> "<ol class='breadcrumb'>",
			'close' 	=> "</ol>",
			'itemOpen' 	=> "<li class='breadcrumb-item'>",
			'itemClose' => "</li>"
		);
	}

	function add($title, $href){		
		if (!$title OR !$href) return;
		$this->breadcrumbs[] = array('title' => $title, 'href' => $href);
	}
	
	
	function render(){

		if(!empty($this->tags['open'])){
			$output = $this->tags['open'];
		}else{
			$output = '<ol class="breadcrumb">';
		}
		
		$count = count($this->breadcrumbs)-1;
		foreach($this->breadcrumbs as $index => $breadcrumb){
		
			if($index == $count){
				$output .= $this->tags['itemOpen'];
				$output .= $breadcrumb['title'];
				$output .= '</li>';
			}else{
				$output .= $this->tags['itemOpen']; // Should implement class='active' for lasted Item ***
				$output .= '<a href="'.$breadcrumb['href'].'">';
				$output .= $breadcrumb['title'];
				$output .= '</a>';
				$output .= '</li>';
			}
			
		}
		
		
		$output .= "</ol>";
				
		

		return $output;
	}

}
