<?php
// ************************************
// Custom Functions for Template Rendering
// ************************************

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