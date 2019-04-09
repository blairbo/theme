<?php
/**
 * Base Setup.
 *
 * @package  HeadlessPress
 */

// Thumbnail Support
add_theme_support( 'post-thumbnails' );


// Run REST Filters
add_action( 'wp_loaded', function() {

  
  $headless_settings = get_option( 'headless-settings', array() ); // Array of All Options
  $headless_setting_author = $headless_settings['headless-setting-author']; // Author
  $headless_setting_thumbnails = $headless_settings['headless-setting-thumbnails']; // Thumbnails
  $headless_setting_categories = $headless_settings['headless-setting-categories']; // Categories
  $headless_setting_acf = $headless_settings['headless-setting-acf']; // Categories

  $post_types = get_post_types( array(
    "show_in_rest" => true,
    "show_in_menu" => true
  ), 'names', 'and' ); 

  foreach ( $post_types as $post_type ) {

    if($headless_setting_author){
      add_filter('rest_prepare_' . $post_type, 'hp_filter_author', 10, 3);
    }
    if($headless_setting_thumbnails){
      add_filter('rest_prepare_' . $post_type, 'hp_filter_thumbnails', 10, 3);
    }
    if($headless_setting_categories){
      add_filter('rest_prepare_' . $post_type, 'hp_filter_categories', 10, 3);
    }

  }

  if($headless_setting_author){
    add_filter( 'acf/format_value', 'hp_filter_acf', 100);
  }

});