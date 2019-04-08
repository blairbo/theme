<?php

function hp_filter_acf($value){
  if ( $value instanceof WP_Post ) {
    return [
      'post_type' => $value->post_type,
      'id'        => $value->ID,
    ];
  }
  return $value;
}