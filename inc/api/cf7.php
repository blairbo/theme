<?php

require_once get_template_directory() . '/inc/functions/cf7-schema.php';

if (function_exists('wpcf7_contact_form')) {
    add_action('init', function () {
        register_rest_route('hp/v1', '/contact-forms/(?P<id>\d+)/schema',
            array(
                array(
                    'methods' => WP_REST_Server::READABLE,
                    'callback' => 'hp_rest_get_contact_form',
                ),
            )
        );
    });
}
