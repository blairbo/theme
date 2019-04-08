<?php
/**
 * Generate thumbnail keys automatically for all Post Types.
 * @package  Headless_WP
 */

function hp_filter_thumbnails($data, $post, $request){
  $_data = $data->data;
  $thumbnail_id = get_post_thumbnail_id( $post->ID );
  $sizes = get_intermediate_image_sizes();
  $thumbnails = array();
  $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

  // other image sizes
  foreach ($sizes as $size) {
    $thumbnail = wp_get_attachment_image_src( $thumbnail_id, $size );
    $thumbnails[$size] = $thumbnail[0];
  }

  // full image size
  $full = wp_get_attachment_image_src( $thumbnail_id, 'full' );
  $thumbnails['full'] = $full[0];


  // construct thumbnail object
  $_data['thumbnail']['id'] = (int)$thumbnail_id;
  $_data['thumbnail']['alt'] = $thumbnail_alt;
  $_data['thumbnail']['sizes'] = $thumbnails;

  $data->data = $_data;
  return $data;
}
