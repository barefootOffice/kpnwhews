<?php
// ************************************
// Specific Setting for this template
// ************************************

// WordPress: Adds Featured Image functionality to pages/posts
add_theme_support('post-thumbnails');

// WordPress: SEO Adds Title tag
add_action('after_setup_theme', 'title_tag_theme_setup');
function title_tag_theme_setup(){
	add_theme_support( 'title-tag' );
}

// WordPress: SEO Modifies robots.txt output
add_filter('robots_txt','modify_robots_txt', 99,2);
function modify_robots_txt($output,$public){
	//$array = explode("\n",$output);
	//print_r($array);

	$siteDomain = get_bloginfo('url');
	$newOutput  = "User-agent: *".PHP_EOL;
	$newOutput .= "Disallow: /wp-admin/".PHP_EOL;
	$newOutput .= "Allow: /wp-admin/admin-ajax.php".PHP_EOL;
	$newOutput .= "Disallow: /tag/".PHP_EOL;
	$newOutput .= "Disallow: /author/".PHP_EOL;
	$newOutput .= "Disallow: */trackback".PHP_EOL;
	$newOutput .= "Disallow: /wp-content/uploads/wpo-plugins-tables-list.json".PHP_EOL;
	$newOutput .= "Sitemap: ".$siteDomain."/sitemap.xml".PHP_EOL;

	return $newOutput;
}

// WordPress: Removes Content Editor from select pages
//add_action('init', 'remove_editor');
function remove_editor(){
	// Get the Post ID.
	if (isset($_GET['post'])){
		$postID = $_GET['post'];
	} else if (isset($_POST['post_ID'])){
		$postID = $_POST['post_ID'];
	} else {return;}

	// Get the Post Name
	$post_name = get_post_field('post_name',$postID);

	// Page slugs to INCLUDE the editor/excerpt
	$pages_to_include = array('privacy-policy');

	// Removes Editor/Excerpt from select pages
	if (!in_array($post_name,$pages_to_include)){
		remove_post_type_support('page','editor');
		remove_post_type_support('page','excerpt');
	}

	// Removes Featured Image from ALL pages
	remove_post_type_support('page','thumbnail');
}

// WordPress: Disable Plugin Update Notifications
//add_filter('site_transient_update_plugins','filter_plugin_updates');
function filter_plugin_updates($value) {
	//unset( $value->response['wp-media-folder/wp-media-folder.php'] );
	return $value;
}

// WordPress: Remove "Private: " from titles
add_filter('the_title', 'remove_private_prefix');
function remove_private_prefix($title){
	$title = str_replace('Private: ', '', $title);
	return $title;
}

?>