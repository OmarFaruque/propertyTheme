<?php 
/*
* Post Type's
*/

add_action( 'init', 'ls_awards' );
/**
 * Register post type History.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ls_awards() {
	$awlabels = array(
		'name'               => _x( 'Award', 'post type general name', 'Property Supplier' ),
		'singular_name'      => _x( 'Award', 'post type singular name', 'Property Supplier' ),
		'menu_name'          => _x( 'Award', 'admin menu', 'Property Supplier' ),
		'name_admin_bar'     => _x( 'Award', 'add new on admin bar', 'Property Supplier' ),
		'add_new'            => _x( 'Add New', 'Award', 'Property Supplier' ),
		'add_new_item'       => __( 'Add New Award', 'Property Supplier' ),
		'new_item'           => __( 'New Award', 'Property Supplier' ),
		'edit_item'          => __( 'Edit Award', 'Property Supplier' ),
		'view_item'          => __( 'View Awards', 'Property Supplier' ),
		'all_items'          => __( 'All Award', 'Property Supplier' ),
		'search_items'       => __( 'Search Award', 'Property Supplier' ),
		'parent_item_colon'  => __( 'Parent Award:', 'Property Supplier' ),
		'not_found'          => __( 'No Award found.', 'Property Supplier' ),
		'not_found_in_trash' => __( 'No Award found in Trash.', 'Property Supplier' )
	);

	$awtargs = array(
		'labels'             => $awlabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'award' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'award', $awtargs );
}




add_action( 'init', 'ls_history' );
/**
 * Register post type History.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ls_history() {
	$htlabels = array(
		'name'               => _x( 'History', 'post type general name', 'Property Supplier' ),
		'singular_name'      => _x( 'History', 'post type singular name', 'Property Supplier' ),
		'menu_name'          => _x( 'History', 'admin menu', 'Property Supplier' ),
		'name_admin_bar'     => _x( 'History', 'add new on admin bar', 'Property Supplier' ),
		'add_new'            => _x( 'Add New', 'History', 'Property Supplier' ),
		'add_new_item'       => __( 'Add New History', 'Property Supplier' ),
		'new_item'           => __( 'New History', 'Property Supplier' ),
		'edit_item'          => __( 'Edit History', 'Property Supplier' ),
		'view_item'          => __( 'View Historys', 'Property Supplier' ),
		'all_items'          => __( 'All History', 'Property Supplier' ),
		'search_items'       => __( 'Search History', 'Property Supplier' ),
		'parent_item_colon'  => __( 'Parent History:', 'Property Supplier' ),
		'not_found'          => __( 'No History found.', 'Property Supplier' ),
		'not_found_in_trash' => __( 'No History found in Trash.', 'Property Supplier' )
	);

	$htargs = array(
		'labels'             => $htlabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'history' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'excerpt' )
	);
	register_post_type( 'history', $htargs );
}



add_action( 'init', 'ls_team' );
/**
 * Register post type Slider.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ls_team() {
	$tmlabels = array(
		'name'               => _x( 'Team Member', 'post type general name', 'Property Supplier' ),
		'singular_name'      => _x( 'Team', 'post type singular name', 'Property Supplier' ),
		'menu_name'          => _x( 'Team', 'admin menu', 'Property Supplier' ),
		'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 'Property Supplier' ),
		'add_new'            => _x( 'Add New', 'Team', 'Property Supplier' ),
		'add_new_item'       => __( 'Add New Team', 'Property Supplier' ),
		'new_item'           => __( 'New Team', 'Property Supplier' ),
		'edit_item'          => __( 'Edit Team', 'Property Supplier' ),
		'view_item'          => __( 'View Teams', 'Property Supplier' ),
		'all_items'          => __( 'All Team Members', 'Property Supplier' ),
		'search_items'       => __( 'Search Team Members', 'Property Supplier' ),
		'parent_item_colon'  => __( 'Parent Team Members:', 'Property Supplier' ),
		'not_found'          => __( 'No Team Members found.', 'Property Supplier' ),
		'not_found_in_trash' => __( 'No Team Members found in Trash.', 'Property Supplier' )
	);

	$tmargs = array(
		'labels'             => $tmlabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'team' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);
	register_post_type( 'team', $tmargs );
}




add_action( 'init', 'ps_slider' );
/**
 * Register post type Slider.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ps_slider() {
	$labels = array(
		'name'               => _x( 'Sliders', 'post type general name', 'Property Supplier' ),
		'singular_name'      => _x( 'Slider', 'post type singular name', 'Property Supplier' ),
		'menu_name'          => _x( 'Slider', 'admin menu', 'Property Supplier' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'Property Supplier' ),
		'add_new'            => _x( 'Add New', 'Slider', 'Property Supplier' ),
		'add_new_item'       => __( 'Add New Slider', 'Property Supplier' ),
		'new_item'           => __( 'New Slider', 'Property Supplier' ),
		'edit_item'          => __( 'Edit Slider', 'Property Supplier' ),
		'view_item'          => __( 'View Sliders', 'Property Supplier' ),
		'all_items'          => __( 'All Sliders', 'Property Supplier' ),
		'search_items'       => __( 'Search Sliders', 'Property Supplier' ),
		'parent_item_colon'  => __( 'Parent Sliders:', 'Property Supplier' ),
		'not_found'          => __( 'No Sliders found.', 'Property Supplier' ),
		'not_found_in_trash' => __( 'No Sliders found in Trash.', 'Property Supplier' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title')
	);
	register_post_type( 'slider', $args );
}




add_action( 'init', 'ps_property' );
/**
 * Register post type Property.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ps_property() {
	$labels = array(
		'name'               => _x( 'Propertys', 'post type general name', 'Property Supplier' ),
		'singular_name'      => _x( 'Property', 'post type singular name', 'Property Supplier' ),
		'menu_name'          => _x( 'Property', 'admin menu', 'Property Supplier' ),
		'name_admin_bar'     => _x( 'Property', 'add new on admin bar', 'Property Supplier' ),
		'add_new'            => _x( 'Add New Property', 'Property', 'Property Supplier' ),
		'add_new_item'       => __( 'Add New Property', 'Property Supplier' ),
		'new_item'           => __( 'New Property', 'Property Supplier' ),
		'edit_item'          => __( 'Edit Property', 'Property Supplier' ),
		'view_item'          => __( 'View Propertys', 'Property Supplier' ),
		'all_items'          => __( 'All Propertys', 'Property Supplier' ),
		'search_items'       => __( 'Search Propertys', 'Property Supplier' ),
		'parent_item_colon'  => __( 'Parent Propertys:', 'Property Supplier' ),
		'not_found'          => __( 'No Propertys found.', 'Property Supplier' ),
		'not_found_in_trash' => __( 'No Propertys found in Trash.', 'Property Supplier' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'property' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies' 		 => array('property-category', 'property-size', 'property-type')
	);
	register_post_type( 'property', $args );
}



add_action( 'init', 'ps_testimonial' );
/**
 * Register post type Property.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ps_testimonial() {
	$labels = array(
		'name'               => _x( 'Testimonial', 'post type general name', 'Property Supplier' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'Property Supplier' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'Property Supplier' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'Property Supplier' ),
		'add_new'            => _x( 'Add New Testimonial', 'Property', 'Property Supplier' ),
		'add_new_item'       => __( 'Add New Testimonial', 'Property Supplier' ),
		'new_item'           => __( 'New Testimonial', 'Property Supplier' ),
		'edit_item'          => __( 'Edit Testimonial', 'Property Supplier' ),
		'view_item'          => __( 'View Testimonials', 'Property Supplier' ),
		'all_items'          => __( 'All Testimonials', 'Property Supplier' ),
		'search_items'       => __( 'Search Testimonials', 'Property Supplier' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'Property Supplier' ),
		'not_found'          => __( 'No Testimonials found.', 'Property Supplier' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'Property Supplier' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'testimonial', $args );
}



add_action( 'init', 'ps_news' );
/**
 * Register post type Property.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ps_news() {
	$labels = array(
		'name'               => _x( 'News', 'post type general name', 'Property Supplier' ),
		'singular_name'      => _x( 'News', 'post type singular name', 'Property Supplier' ),
		'menu_name'          => _x( 'News', 'admin menu', 'Property Supplier' ),
		'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'Property Supplier' ),
		'add_new'            => _x( 'Add New News', 'News', 'Property Supplier' ),
		'add_new_item'       => __( 'Add New News', 'Property Supplier' ),
		'new_item'           => __( 'New News', 'Property Supplier' ),
		'edit_item'          => __( 'Edit News', 'Property Supplier' ),
		'view_item'          => __( 'View News', 'Property Supplier' ),
		'all_items'          => __( 'All News', 'Property Supplier' ),
		'search_items'       => __( 'Search News', 'Property Supplier' ),
		'parent_item_colon'  => __( 'Parent News:', 'Property Supplier' ),
		'not_found'          => __( 'No News found.', 'Property Supplier' ),
		'not_found_in_trash' => __( 'No News found in Trash.', 'Property Supplier' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);
	register_post_type( 'news', $args );
}





/*
* Register Taxonomy
*/
function property_taxonomy() {
    register_taxonomy(
        'property-category',
        'property',
        array(
            'label' => __( 'Property Category' ),
            'rewrite' => array( 'slug' => 'property-category' ),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );

    register_taxonomy(
        'property-type',
        'property',
        array(
            'label' => __( 'Property Type' ),
            'rewrite' => array( 'slug' => 'property-type' ),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );

    $sizelabels = array(
		'name'                       => _x( 'Sizes', 'Property Size', 'Property Supplier' ),
		'singular_name'              => _x( 'Size', 'Property Size', 'Property Supplier' ),
		'search_items'               => __( 'Search Sizes', 'Property Supplier' ),
		'popular_items'              => __( 'Popular Sizes', 'Property Supplier' ),
		'all_items'                  => __( 'All Sizes', 'Property Supplier' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Size', 'Property Supplier' ),
		'update_item'                => __( 'Update Size', 'Property Supplier' ),
		'add_new_item'               => __( 'Add New Size', 'Property Supplier' ),
		'new_item_name'              => __( 'New Size Name', 'Property Supplier' ),
		'separate_items_with_commas' => __( 'Separate size with commas & set size in sqft', 'Property Supplier' ),
		'add_or_remove_items'        => __( 'Add or remove sizes', 'Property Supplier' ),
		'choose_from_most_used'      => __( 'Choose from the most used sizes', 'Property Supplier' ),
		'not_found'                  => __( 'No sizes found.', 'Property Supplier' ),
		'menu_name'                  => __( 'Property Sizes', 'Property Supplier' ),
	);
    $sizeargs = array(
		'hierarchical'          => false,
		'labels'                => $sizelabels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'property-size' ),
	);
   register_taxonomy( 'property-size', 'property', $sizeargs );




   $bedlabels = array(
		'name'                       => _x( 'Beds', 'Property Bed', 'Property Supplier' ),
		'singular_name'              => _x( 'Bed', 'Property Bed', 'Property Supplier' ),
		'search_items'               => __( 'Search Sizes', 'Property Supplier' ),
		'popular_items'              => __( 'Popular Sizes', 'Property Supplier' ),
		'all_items'                  => __( 'All Sizes', 'Property Supplier' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Bed', 'Property Supplier' ),
		'update_item'                => __( 'Update Bed', 'Property Supplier' ),
		'add_new_item'               => __( 'Add New Bed', 'Property Supplier' ),
		'new_item_name'              => __( 'New Bed Name', 'Property Supplier' ),
		'separate_items_with_commas' => __( 'Separate bed with commas', 'Property Supplier' ),
		'add_or_remove_items'        => __( 'Add or remove beds', 'Property Supplier' ),
		'choose_from_most_used'      => __( 'Choose from the most used beds', 'Property Supplier' ),
		'not_found'                  => __( 'No beds found.', 'Property Supplier' ),
		'menu_name'                  => __( 'Beds', 'Property Supplier' ),
	);
    $bedargs = array(
		'hierarchical'          => false,
		'labels'                => $bedlabels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'bed' ),
	);
   register_taxonomy( 'bed', 'property', $bedargs );
}

add_action( 'init', 'property_taxonomy' );