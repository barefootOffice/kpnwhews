<?php
// ************************************
// Custom Functions for Template Rendering
// ************************************

// Custom: Outputs hero block from ACF Configuration
function get_wellness_hero($pageID=null){
	if (isset($pageID)){
		if (get_field('wellness_layout_listing',$pageID)){
			$page_blocks = get_field('wellness_layout_listing',$pageID);
		} else if (get_field('wellness_layout_topic',$pageID)){
			$page_blocks = get_field('wellness_layout_topic',$pageID);
		}
	} else {
		if (get_field('wellness_layout_listing')){
			$page_blocks = get_field('wellness_layout_listing');
		} else if (get_field('wellness_layout_topic')){
			$page_blocks = get_field('wellness_layout_topic');
		}
	}

	foreach ($page_blocks as $row){
		if ($row['acf_fc_layout'] == 'hero'){
			return $row;
		}
	}
}

// Custom: Outputs section blocks from ACF Configuration
function get_wellness_rows($pageID=null){
	if (isset($pageID)){
		if (get_field('wellness_layout_listing',$pageID)){
			$page_blocks = get_field('wellness_layout_listing',$pageID);
		} else if (get_field('wellness_layout_topic',$pageID)){
			$page_blocks = get_field('wellness_layout_topic',$pageID);
		}
	} else {
		if (get_field('wellness_layout_listing')){
			$page_blocks = get_field('wellness_layout_listing');
		} else if (get_field('wellness_layout_topic')){
			$page_blocks = get_field('wellness_layout_topic');
		}
	}

	$allRows = array();
	foreach ($page_blocks as $row){
		if ($row['acf_fc_layout'] == 'row'){
			array_push($allRows,$row);
		}
	}
	return $allRows;

}

// Custom: Outputs inline SVG files (set URL from base of template folder)
function inlineSVG($filename){
	if (substr($filename, 0, 1) === "/"){
		$filename = substr($filename, 1);
	}
	$filepath = get_template_directory().'/'.$filename;
	if (is_file($filepath)) {
		print file_get_contents($filepath);
  } else {
		print "unable to load graphic";
  }
}

?>