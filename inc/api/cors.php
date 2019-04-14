<?php
/**
 * REST API CORS filter.
 *
 * @package  HeadlessPress
 */
add_action(
	'rest_api_init',
	function () {
		remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
		add_filter(
			'rest_pre_serve_request',
			function ( $value ) {
				header( 'Access-Control-Allow-Origin: *' );
				header( 'Access-Control-Allow-Methods: GET');
				header( 'Access-Control-Expose-Headers: Link', false );
				header( 'Access-Control-Allow-Headers: X-Requested-With' );
				return $value;
			}
		);
	},
	15
);
