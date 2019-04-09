<?php
/**
 * HeadlessPress Theme.
 *
 * @package  HeadlessPress
 */

//** Core Config */
require_once 'inc/core/options.php';
require_once 'inc/core/setup.php';
require_once 'inc/core/menus.php';
require_once 'inc/core/thumbnails.php';
require_once 'inc/core/plugins.php';

//** API */
require_once 'inc/api/cors.php';

//** Post Types */
foreach(glob(get_template_directory() . "/post-types/*.php") as $post_type){
  require_once $post_type;
}

//** API Filters */
foreach(glob(get_template_directory() . "/filters/*.php") as $filter){
  require_once $filter;
};
