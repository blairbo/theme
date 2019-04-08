<?php
/**
 * REST API CORS filter.
 *
 * @package  Headless_WP
 */
add_action(
	'rest_api_init',
	function () {

		// $headless_settings = get_option( 'headless-settings', array() );
		// $headless_setting_cors_responses = $headless_settings['headless-setting-cors-responses'];
		remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );

		add_filter(
			'rest_pre_serve_request',
			function ( $value ) {
				$headless_settings = get_option( 'headless-settings', array() );
				$headless_setting_cors_responses = $headless_settings['headless-setting-cors-responses'];

				header( 'Access-Control-Allow-Origin: *' );
				header( 'Access-Control-Allow-Methods: GET, ' . $headless_setting_cors_responses);
				header( 'Access-Control-Expose-Headers: Link', false );
				header( 'Access-Control-Allow-Headers: X-Requested-With' );
				return $value;
			}
		);
	},
	15
);
