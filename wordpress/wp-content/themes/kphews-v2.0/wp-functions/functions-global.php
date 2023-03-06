<?php
// ************************************
// Global Settings (Same for all sites)
// ************************************

// WordPress: Disable WordPress Gutenberg Editor (v5.0+)
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('gutenberg_can_edit_post', '__return_false', 10);

// WordPress: Moves jQuery calls to the footer
add_action('wp_default_scripts','move_jquery_into_footer');
function move_jquery_into_footer($wp_scripts){
    if (is_admin()){return;}
    $wp_scripts->add_data('jquery','group',1);
    $wp_scripts->add_data('jquery-core','group',1);
    $wp_scripts->add_data('jquery-migrate','group',1);
}

// WordPress: Strips information out of head
add_action('init','clean_wp_head');
function clean_wp_head(){
	remove_action('wp_head','wp_generator');
	remove_action('wp_head','rsd_link');
	remove_action('wp_head','feed_links', 2);
	remove_action('wp_head','feed_links_extra', 3);
	remove_action('wp_head','index_rel_link');
	remove_action('wp_head','wlwmanifest_link');
	remove_action('wp_head','start_post_rel_link', 10, 0);
	remove_action('wp_head','parent_post_rel_link', 10, 0);
	remove_action('wp_head','adjacent_posts_rel_link', 10, 0);
	remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head','wp_shortlink_wp_head', 10, 0);
}

// WordPress: Remove wp version number from scripts and styles
add_filter('style_loader_src','remove_css_js_version',9999);
add_filter('script_loader_src','remove_css_js_version',9999);
function remove_css_js_version($src){
	if( strpos( $src, '?ver=' ) )
		 $src = remove_query_arg( 'ver', $src );
	return $src;
}

// WordPress: Disable Theme Update Notifications
add_action('init','disable_theme_updates');
function disable_theme_updates(){
	remove_action( 'load-themes.php', 'wp_update_themes' );
	remove_action( 'load-update.php', 'wp_update_themes' );
	remove_action( 'load-update-core.php', 'wp_update_themes' );
	remove_action( 'admin_init', '_maybe_update_themes' );
	remove_action( 'wp_update_themes', 'wp_update_themes' );
	add_filter('pre_site_transient_update_themes','remove_core_updates');
	function remove_core_updates(){
		global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version);
	}
}

// WordPress: Remove JSON API links in header
add_action('after_setup_theme','remove_json_api');
function remove_json_api(){
	remove_action('wp_head','rest_output_link_wp_head', 10);
	remove_action('wp_head','wp_oembed_add_discovery_links', 10);
	remove_action('rest_api_init','wp_oembed_register_route');
	add_filter('embed_oembed_discover','__return_false');
	remove_filter('oembed_dataparse','wp_filter_oembed_result', 10);
	remove_action('wp_head','wp_oembed_add_discovery_links');
	remove_action('wp_head','wp_oembed_add_host_js');
	//add_filter( 'rewrite_rules_array','disable_embeds_rewrites');
}

// WordPress: Disable the REST API
add_action('after_setup_theme','disable_json_api');
function disable_json_api(){
  // Filters for WP-API version 1.x
  add_filter('json_enabled','__return_false');
  add_filter('json_jsonp_enabled','__return_false');
  // Filters for WP-API version 2.x
  add_filter('rest_enabled','__return_false');
  add_filter('rest_jsonp_enabled','__return_false');
}

// WordPress: Removes the default Post types from the admin section
add_action('admin_menu','remove_menus');
function remove_menus(){
	// Removes for Everyone
	remove_menu_page('edit.php');                   //Posts
	remove_menu_page('edit-comments.php');          //Comments

	// Removes for non-Admin Users
	if(!current_user_can('update_core')) {
		remove_menu_page('tools.php');					//Tools
	}
}

// WordPress: Disable WordPress Admin Bar for all users
show_admin_bar(false);

// WordPress: Add slug name to body class
add_filter('body_class','add_body_class');
function add_body_class($classes){
	global $post;
	if (isset($post)){
		$classes[] = $post->post_type.'-'.$post->post_name;
	}
	return $classes;
}

// WordPress: Prevents Thumbnail Generation of uploaded images
//add_filter('intermediate_image_sizes_advanced','add_image_insert_override');
function add_image_insert_override($sizes){
	//unset($sizes['thumbnail']);
	unset($sizes['medium']);
	unset($sizes['medium_large']);
	unset($sizes['large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}

// WordPress: Prevents Thumbnail Generation of uploaded PDFs
//add_filter('fallback_intermediate_image_sizes','wpb_disable_pdf_previews');
function wpb_disable_pdf_previews(){
	$fallbacksizes = array();
	return $fallbacksizes;
}

// WordPress: Forces lowercase on all files uploaded to the Media Library
add_filter('sanitize_file_name', 'media_library_filename_lowercase', 10);
function media_library_filename_lowercase($filename){
	$info = pathinfo($filename);
	$ext  = empty($info['extension']) ? '' : '.' . $info['extension'];
	$name = basename($filename, $ext);
	return strtolower($name . $ext);
}

// WordPress: Restricts upload file type
//add_filter('upload_mimes', 'media_library_restrict_mime');
function media_library_restrict_mime($mime_types){
	$mime_types = array(
		'jpg|jpeg' => 'image/jpeg',
		'gif' => 'image/gif',
		'png' => 'image/png',
		'pdf' => 'application/pdf'
	);
	return $mime_types;
}

// WordPress: Disable WP Emojicons
add_action('init','disable_wp_emojicons');
function disable_wp_emojicons(){
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );

	function disable_emojicons_tinymce($plugins){
		if (is_array($plugins)) {
			return array_diff($plugins, array('wpemoji'));
		} else {
			return array();
		}
	}
}

// WordPress: Show All Admin Pages
add_filter('get_user_metadata','admin_show_all_pages', 10, 4);
function admin_show_all_pages($check,$object_id,$meta_key,$single){
	if ('edit_page_per_page' == $meta_key){
		return 2000;
	} else {
		return $check;
	}
}

?>