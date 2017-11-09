<?php
/*
Plugin Name: PCLD page
Description: I dont want no description
Version: 1.0
Author: Shramee Srivastav
Author URI: http://shramee.com
Author Email: shramee.srivastav@gmail.com
*/

define( 'PCLDPAGE', plugin_dir_url( __FILE__ ) );
define( 'PCLDPAGE_VER', 1 );

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

add_action( 'init', 'pcld_pp_init' );