<?php
/**
 * Headless WP Settings Page.
 * @package  HeadlessPress
 */
require_once get_template_directory() . '/libs/options/class-options-page.php';

$pages = array(
	'headless-settings'	=> array(
		'parent_slug'	=> 'options-general.php',
		'page_title'	=> __( 'Headlesspress', 'headlesspress' ),
		'sections'		=> array(
			'headless-section-filters'	=> array(
				'title'			=> __( 'Filter Settings', 'headlesspress' ),
				'text'			=> '<p>' . __( 'HeadlessPress comes with a few inbuilt filters to help you get useful data easier.', 'headlesspress' ) . '</p>',
				'fields'		=> array(
					'headless-setting-author'		=> array(
						'id'        => __( 'headless-setting-author', 'headlesspress' ),
						'title'			=> __( 'Author Information', 'headlesspress' ),
						'type'			=> 'checkbox',
						'checked'   => true,
						'text'			=> __( 'Include Author information in the <code>[post-type]</code> response.' ),
					),
					'headless-setting-thumbnails'		=> array(
						'id'        => __( 'headless-setting-thumbnails', 'headlesspress' ),
						'title'			=> __( 'Thumbnails', 'headlesspress' ),
						'type'			=> 'checkbox',
						'checked'   => true,
						'text'			=> __( 'Include thumbnails in the <code>[post-type]</code> response.' ),
					),
					'headless-setting-categories'		=> array(
						'id'        => __( 'headless-setting-categories', 'headlesspress' ),
						'title'			=> __( 'Categories & Tags', 'headlesspress' ),
						'type'			=> 'checkbox',
						'checked'   => true,
						'text'			=> __( 'Include Categories & Tags in the <code>[post-type]</code> response.' ),
					),
					'headless-setting-acf'		=> array(
						'id'        => __( 'headless-setting-acf', 'headlesspress' ),
						'title'			=> __( 'ACF Optimization', 'headlesspress' ),
						'type'			=> 'checkbox',
						'checked'   => false,
						'text'			=> __( 'Optimize ACF fields (recommended when using Gatsby & Gridsome).' ),
					),
				),
			),
		),
	),
);

$option_page = new RationalOptionPages( $pages );