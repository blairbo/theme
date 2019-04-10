<?php

require_once get_template_directory() . '/libs/cf7/schema.php';

if (function_exists('wpcf7_contact_form')) {
  register_rest_route( 'contact-form-7/v1', '/contact-forms/(?P<id>\d+)/schema',
    array(
      array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'hp_rest_get_contact_form'
      ),
    )
  );
}



