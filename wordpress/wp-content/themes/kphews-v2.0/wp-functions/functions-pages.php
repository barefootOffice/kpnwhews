<?php
// ************************************
// Page Templates
// ************************************

// WordPress: Forces page templates to load without needing to set template type
add_filter('template_include', 'force_page_template', 100);
function force_page_template($template){
	global $post;

	if (is_404()){
		$new_template = locate_template(array('page-template-404.php'));
	}
	if (is_front_page() || is_page('home')){//Front Page must be assigned in Setting > Reading
		$new_template = locate_template(array('page-template-home.php'));
	}

	// Search
	if (is_page('search')){
		$new_template = locate_template(array('page-template-search-results.php'));
	}
	else if (is_search()){
		$new_template = locate_template(array('page-template-search-results.php'));
	}

	if (isset($new_template) && $new_template != '' && file_exists($new_template)){return $new_template;}
	else {return $template;}
}
?>