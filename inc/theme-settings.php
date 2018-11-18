<?php
/**
 * Check and setup theme's default settings
 *
 * @package mymentech
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists ( 'mymentech_setup_theme_default_settings' ) ) {
	function mymentech_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$mymentech_posts_index_style = get_theme_mod( 'mymentech_posts_index_style' );
		if ( '' == $mymentech_posts_index_style ) {
			set_theme_mod( 'mymentech_posts_index_style', 'default' );
		}

		// Sidebar position.
		$mymentech_sidebar_position = get_theme_mod( 'mymentech_sidebar_position' );
		if ( '' == $mymentech_sidebar_position ) {
			set_theme_mod( 'mymentech_sidebar_position', 'right' );
		}

		// Container width.
		$mymentech_container_type = get_theme_mod( 'mymentech_container_type' );
		if ( '' == $mymentech_container_type ) {
			set_theme_mod( 'mymentech_container_type', 'container' );
		}
	}
}