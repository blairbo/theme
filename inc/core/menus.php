<?php
/**
 * Register Menus.
 *
 * @package  Headless_WP
 */

/**
 * Register navigation menus.
 *
 * @return void
 */
function register_menus() {
	register_nav_menu( 'header-menu', __( 'Header Menu', 'headlesspress' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'headlesspress' ) );
}
add_action( 'after_setup_theme', 'register_menus' );


