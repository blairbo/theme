<?php
/**
 * Get Required plugins for Headless WP.
 *
 * @package  HeadlessPress
 */

require_once get_template_directory() . '/libs/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'headlesspress_register_required_plugins' );


function headlesspress_register_required_plugins() {


	$plugins = array(

		array(
			'name'        => 'Advanced Custom Fields',
      'slug'        => 'advanced-custom-fields',
      'is_callable' => 'get_field',
			'required'    => true,
    ),

    array(
			'name'      => 'ACF API Output',
			'slug'      => 'acf-to-rest-api',
			'required'  => true,
    ),

    array(
			'name'      => 'Menus API Output',
			'slug'      => 'wp-rest-api-v2-menus',
			'required'  => true,
    ),
    
    array(
			'name'        => 'Yoast SEO',
			'slug'        => 'wordpress-seo',
      'is_callable' => 'wpseo_init',
      'required'    => true
    ),
    
		array(
			'name'      => 'Yoast SEO API Output',
			'slug'      => 'wp-api-yoast-meta',
      'source'    => 'https://github.com/headlesspress/wp-api-yoast-meta/archive/master.zip',
      'required'  => true,
    ),
    
    array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'  => false,
    ),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'headlesspress',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                       // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',  // Menu slug.
		'parent_slug'  => 'themes.php',             // Parent menu slug.
		'capability'   => 'edit_theme_options',     // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                     // Show admin notices or not.
		'dismissable'  => true,                     // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                     // Automatically activate plugins after installation or not.
		'message'      => '',                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}