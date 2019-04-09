<?php
/**
 * Generate thumbnail keys automatically for all Post Types.
 * @package  HeadlessPress
 */

function hp_filter_author($data, $post, $request){
  
  $_data = $data->data;

  $author_id = $_data['author'];
  $author = array();

  $author['id'] = get_the_author_meta( 'ID', $author_id );
  $author['name'] = get_the_author_meta( 'display_name', $author_id );
  $author['bio'] = get_the_author_meta( 'description', $author_id );
  $author['avatar'] = get_the_author_meta( 'avatar', $author_id );

  $_data['meta']['author'] = $author;
  $data->data = $_data;
  
  return $data;
}
