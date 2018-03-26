<?php
// create slides posttype ------------------------>
function slides_posttype() {
	$name = 'slides';
	$labels = array(
		'name' => __( 'Slides' ),
		'singular_name' => __( 'Slide' ),
		'add_new' => _x('Add new slide', 'slide'),
		'add_new_item' => _x('New slide', 'slide'),
		'view_item' => __( 'View slide'),
		'view_items'=>  __( 'View slide'),
		'search_items' =>  __( 'Search slides'),
		'not_found' =>  __( 'slide not found'),
		'uploaded_to_this_item' =>  __( 'add file')
	);
	$supports = array(
		'title',
		'editor',
		'thumbnail'
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_admin_bar' => true,
		'menu_icon' => 'dashicons-images-alt2',
		'menu_position' => 5,
		'has_archive' => true,
		'rewrite' => true,
		'publicly_queryable' => true,
	);
	register_post_type( $name, $args);
}
add_action( 'init', 'slides_posttype' );
// end create slides posttype -------------------->

// create team posttype -------------------------->
function teams_posttype() {
	$name = 'team';
	$labels = array(
		'name' => __( 'Team Members' ),
		'singular_name' => __( 'Team Member' ),
		'add_new' => _x('Add new Team Menber', 'team'),
		'add_new_item' => _x('New Team Member', 'team'),
		'view_item' => __( 'View Team Member'),
		'view_items'=>  __( 'View Team Members'),
		'search_items' =>  __( 'Search Team Member'),
		'not_found' =>  __( 'Team Member not found'),
		'uploaded_to_this_item' =>  __( 'add file')
	);
	$supports = array(
		'title',
		'thumbnail'
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_admin_bar' => true,
		'menu_icon' => 'dashicons-groups',
		'menu_position' => 5,
		'rewrite' => true,
		'publicly_queryable' => true
	);
	register_post_type( $name, $args);
}
add_action( 'init', 'teams_posttype' );
// end create team posttype ---------------------->

// create highlight posttype --------------------->
function highlight_posttype() {
	$name = 'highlight';
	$labels = array(
		'name' => __( 'Highlight' ),
		'singular_name' => __( 'Highlight' ),
		'add_new' => _x('Add new highlight', 'highlight'),
		'add_new_item' => _x('New highlight', 'highlight'),
		'view_item' => __( 'View highlight'),
		'view_items'=>  __( 'View highlight'),
		'search_items' =>  __( 'Search highlight'),
		'not_found' =>  __( 'highlight not found'),
		'uploaded_to_this_item' =>  __( 'add file')
	);
	$supports = array(
		'title',
		'editor',
		'thumbnail'
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_admin_bar' => true,
		'menu_icon' => 'dashicons-slides',
		'menu_position' => 6,
		'rewrite' => true,
		'publicly_queryable' => true
	);
	register_post_type( $name, $args);
}
add_action( 'init', 'highlight_posttype' );
// end create highlight posttype ----------------->

// create project posttype --------------------->
register_taxonomy(
	'projects_tax',
	'projects',
	array(
		'label' => __( 'Projects Categories' ),
		'query_var'    => true,
		'rewrite' => array( 'slug' => 'projects_category' , 'with_front' => true),
		'hierarchical' => true
	)
);
function project_posttype() {
	$name = 'projects';
	$labels = array(
		'name' => __( 'Projects' ),
		'singular_name' => __( 'Project' ),
		'add_new' => _x('Add new project', 'project'),
		'add_new_item' => _x('New project', 'project'),
		'view_item' => __( 'View project'),
		'view_items'=>  __( 'View projects'),
		'search_items' =>  __( 'Search projects'),
		'not_found' =>  __( 'project not found'),
		'uploaded_to_this_item' =>  __( 'add file')
	);
	$supports = array(
		'title',
		'editor',
		'thumbnail'
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'show_in_admin_bar' => true,
		'menu_icon' => 'dashicons-grid-view',
		'menu_position' => 6,
		'rewrite' => array( 'slug' => 'projects' ),
		'public' => true,
		'has_archive' => true
	);
	register_post_type( $name, $args);

}
add_action( 'init', 'project_posttype' );

// end create project posttype ----------------->

// create customer_logo posttype --------------------->
function customer_logo_posttype() {
	$name = 'customer_logos';
	$labels = array(
		'name' => __( 'Customer Logos' ),
		'singular_name' => __( 'Customer Logo' ),
		'add_new' => _x('Add new customer logo', 'customer_logo'),
		'add_new_item' => _x('New customer logo', 'customer_logo'),
		'view_item' => __( 'View customer logo'),
		'view_items'=>  __( 'View customer logos'),
		'search_items' =>  __( 'Search customer logos'),
		'not_found' =>  __( 'customer logo not found'),
		'uploaded_to_this_item' =>  __( 'add file')
	);
	$supports = array(
		'title',
		'thumbnail'
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'show_in_admin_bar' => true,
		'menu_icon' => 'dashicons-images-alt2',
		'menu_position' => 6,
		'has_archive' => true,
		'rewrite' => array( 'slug' => 'customer_logos' ),
		'publicly_queryable' => true
	);
	register_post_type( $name, $args);
}
add_action( 'init', 'customer_logo_posttype' );
// end create customer_logo posttype ----------------->
?>
