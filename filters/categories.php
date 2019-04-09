<?php
/**
 * Insert Categories & Tags Automatically.
 * @package  HeadlessPress
 */

function hp_filter_categories($data, $post, $request){
  $_data = $data->data;
  $categoies = get_the_category($post->ID);
  $tags = get_the_tags($post->ID);
  $_data['meta']['categories'] = $categoies;
  $_data['meta']['tags'] = $tags;
  $data->data = $_data;
  return $data;
}
