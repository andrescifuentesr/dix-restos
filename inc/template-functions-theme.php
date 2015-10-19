<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package loulou
 */

//-------------------------------------------------  
//function separator
//-------------------------------------------------
function content_separator_shortcode( $atts ) {
	return '
		<div class="separator"></div>';
}
add_shortcode( 'separator', 'content_separator_shortcode' );


//-------------------------------------------------  
//Upload svg via Media library
//-------------------------------------------------
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//-------------------------------------------------  
//function custome Image: Press image
//-------------------------------------------------
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'imgPresse', 250, 350, false );
}