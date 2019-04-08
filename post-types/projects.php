<?php

function pt_register_projects() {

	/**
	 * Post Type: Projects.
	 */

	$labels = array(
		"name" => __( "Projects", "headlesspress" ),
		"singular_name" => __( "Project", "headlesspress" ),
		"menu_name" => __( "Projects", "headlesspress" ),
		"all_items" => __( "All Projects", "headlesspress" ),
		"add_new" => __( "Add Project", "headlesspress" ),
		"add_new_item" => __( "Add new Project", "headlesspress" ),
		"edit_item" => __( "Edit Project", "headlesspress" ),
		"new_item" => __( "New Project", "headlesspress" ),
		"view_item" => __( "View Project", "headlesspress" ),
		"view_items" => __( "View Projects", "headlesspress" ),
		"search_items" => __( "Search Projects", "headlesspress" ),
		"not_found" => __( "No Projects Found", "headlesspress" ),
		"not_found_in_trash" => __( "No Projects Found In Trash", "headlesspress" ),
	);

	$args = array(
		"label" => __( "Projects", "headlesspress" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "projects",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "project", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "author" ),
		"taxonomies" => array('post_tag', 'category' ),
	);

	register_post_type( "project", $args );
}

add_action( 'init', 'pt_register_projects' );


