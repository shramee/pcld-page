<?php
/*
Plugin Name: PCLD page
Description: I dont want no description
Version: 1.0
Author: Shramee Srivastav
Author URI: http://shramee.com
Author Email: shramee.srivastav@gmail.com
*/

if ( isset( $_REQUEST['all-scripts'] ) )
add_action(
	'wp_enqueue_scripts',
	function() {
		foreach ( $GLOBALS['wp_scripts']->registered as $k => $script ) {
			echo "$k\n<br>\n";
		}
		die();
	},
	11
);

add_action( 'init', function () {
	remove_filter( 'get_the_excerpt', 'woo_remove_dropcap_from_excerpts' );
} );

function pcld_pp_init() {
	add_shortcode( 'pootle-cloud-page', 'pcld_pp_shortcode' );
}

function pcld_pp_shortcode() {
	ob_start();
	include 'tpl/page.php';
	$data = ob_get_clean();

	return $data;

}

function pcld_pp_init_() {

}

add_action( 'init', 'pcld_pp_init' );