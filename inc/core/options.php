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
				'text'			=> '<p>' . __( 'Toggle filter options.', 'headlesspress' ) . '</p>',
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
			'headless-section-cors'	=> array(
				'title'			=> __( 'CORS Settings', 'headlesspress' ),
				'text'			=> '<p>' . __( 'Configure CORS (Cross-Origin Resource Sharing). <br/> You can find out more information about CORS can be found <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS" target="_blank">here</a>.', 'headlesspress' ) . '</p>',
				'fields'		=> array(
					'headless-setting-cors-responses'		=> array(
						'id'        => __( 'headless-setting-cors-responses', 'headlesspress' ),
						'title'			=> __( 'Allowed response types', 'headlesspress' ),
						'text'			=> __( 'Comma seperated response types. e.g. POST, PUT, PATCH, DELETE. <br/>The <strong>GET</strong> response type is always set.' ),
					),
				),
			),
		),
	),
);

$option_page = new RationalOptionPages( $pages );