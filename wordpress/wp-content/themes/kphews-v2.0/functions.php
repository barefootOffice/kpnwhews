<?php
	// Global Options (used for all sites)
	include('wp-functions/functions-global.php');

	// Site Specific Options
	include('wp-functions/functions-site.php');

	// Page Templates
	include('wp-functions/functions-pages.php');

	// Custom Functions used in-template
	include('wp-functions/functions-custom.php');

	// Only use when needed - DO NOT LEAVE ACTIVE
	//add_action('init', 'custom_taxonomy_flush_rewrite');
	function custom_taxonomy_flush_rewrite(){
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}

?>