<?php
/**
 * Presise enqueue scripts
 *
 * @package presise
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'presise_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function presise_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		
		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Oswald%3A400%2C400i%2C500%7CCrimson+Text%3A400%2C400i%2C500&subset=latin-ext', array(), '1.0.0' );
		wp_enqueue_style( 'presise-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $css_version );

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
		$mt_js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/presise.js');
		wp_enqueue_script( 'presise-scripts', get_template_directory_uri() . '/js/theme.min.js', array('jquery'), $js_version, true );
		wp_enqueue_script( 'presise-custom-js', get_template_directory_uri() . '/js/presise.js', array('jquery'), $mt_js_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'presise_scripts' ).

add_action( 'wp_enqueue_scripts', 'presise_scripts' );