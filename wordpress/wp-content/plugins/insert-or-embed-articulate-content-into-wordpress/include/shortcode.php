<?php
/** Shortcode handler */

function iframe_handler( $attr ) {
	$href = '';
	extract( $attr );
	if ( isset( $src ) ) {
		$src = apply_filters( 'iea_iframe_url_after', $src, $attr );
	}
	if ( isset( $href ) ) {
		$href = apply_filters( 'iea_iframe_url_after', $href, $attr );
	}
	return "<p><iframe src='$src' width='$width' height='$height' frameborder='0' scrolling='no'></iframe><br/>";
}

add_shortcode( 'iframe_loader', 'iframe_handler' );

