<?php
// Custom Post Type: Creates 'wellness' Post Type for Wellness Topic section
add_action('init', 'cpt_wellness_register');
function cpt_wellness_register(){
	$labels = array(
		"name" => "Wellness Topics",
		"singular_name" => "Topic",
		"attributes" => "Topic Attributes"
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"taxonomies" => false,
		"rewrite" => array("slug" => "wellness-topics", "with_front" => true),
		"query_var" => true,
		"menu_position" => 30,
		"menu_icon" => "dashicons-clipboard",
		"supports" => array("title","page-attributes","author")
		);
	register_post_type( "wellness", $args );
}

// WordPress: Sets pagination limit for the Resources page
//add_filter('pre_get_posts', 'limit_posts_per_archive_page');
function limit_posts_per_archive_page() {
	if (!is_admin()){
		if (is_archive()){
			$limit = 1;
		} else {
			$limit = get_option('posts_per_page');
		}
		set_query_var('posts_per_archive_page', $limit);
	}
}

?>