<?php

namespace ortimis\Custom;

/**
 * Custom
 * use it to write your custom functions.
 */
class Custom
{
	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		add_action( 'init', array( $this, 'custom_post_type_projects' ) );
		add_action( 'init', array( $this, 'custom_post_type_kunden' ) );
		add_action( 'after_switch_theme', array( $this, 'rewrite_flush' ) );
		add_action( 'init', array( $this, 'projektart_taxonomy' ) );
	}

	/**
	 * Create Custom Post Types
	 * @return The registered post type object, or an error object
	 */
	public function custom_post_type_projects()
	{
		$labels = array(
			'name'               => _x( 'Projects', 'post type general name', 'ortimis' ),
			'singular_name'      => _x( 'Project', 'post type singular name', 'ortimis' ),
			'menu_name'          => _x( 'Projects', 'admin menu', 'ortimis' ),
			'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'ortimis' ),
			'add_new'            => _x( 'Add New', 'book', 'ortimis' ),
			'add_new_item'       => __( 'Add New Project', 'ortimis' ),
			'new_item'           => __( 'New Project', 'ortimis' ),
			'edit_item'          => __( 'Edit Project', 'ortimis' ),
			'view_item'          => __( 'View Project', 'ortimis' ),
			'view_items'         => __( 'View Projects', 'ortimis' ),
			'all_items'          => __( 'All Projects', 'ortimis' ),
			'search_items'       => __( 'Search Projects', 'ortimis' ),
			'parent_item_colon'  => __( 'Parent Projects:', 'ortimis' ),
			'not_found'          => __( 'No Projects found.', 'ortimis' ),
			'not_found_in_trash' => __( 'No Projects found in Trash.', 'ortimis' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'ortimis' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-phone',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'project' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5, // below post
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'projects', $args );
	}

	/**
	 * Create Custom Post Types
	 * @return The registered post type object, or an error object
	 */
	public function custom_post_type_kunden()
	{
		$labels = array(
			'name'               => _x( 'Kunden', 'post type general name', 'ortimis' ),
			'singular_name'      => _x( 'Kunde', 'post type singular name', 'ortimis' ),
			'menu_name'          => _x( 'Kunden', 'admin menu', 'ortimis' ),
			'name_admin_bar'     => _x( 'Kunde', 'add new on admin bar', 'ortimis' ),
			'add_new'            => _x( 'Add New', 'book', 'ortimis' ),
			'add_new_item'       => __( 'Add New Kunde', 'ortimis' ),
			'new_item'           => __( 'New Kunde', 'ortimis' ),
			'edit_item'          => __( 'Edit Kunde', 'ortimis' ),
			'view_item'          => __( 'View Kunde', 'ortimis' ),
			'view_items'         => __( 'View Kunden', 'ortimis' ),
			'all_items'          => __( 'All Kunden', 'ortimis' ),
			'search_items'       => __( 'Search Kunden', 'ortimis' ),
			'parent_item_colon'  => __( 'Parent Kunden:', 'ortimis' ),
			'not_found'          => __( 'No Kunden found.', 'ortimis' ),
			'not_found_in_trash' => __( 'No Kunden found in Trash.', 'ortimis' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'ortimis' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-book-alt',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'Kunde' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 5, // below post
			'supports'           => array( 'title', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'Kunden', $args );
	}

	// Register Custom Taxonomy
	public function projektart_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Projektarten', 'Taxonomy General Name', 'ortimis' ),
			'singular_name'              => _x( 'Projektart', 'Taxonomy Singular Name', 'ortimis' ),
			'menu_name'                  => __( 'Projektarten', 'ortimis' ),
			'all_items'                  => __( 'All Items', 'ortimis' ),
			'parent_item'                => __( 'Parent Item', 'ortimis' ),
			'parent_item_colon'          => __( 'Parent Item:', 'ortimis' ),
			'new_item_name'              => __( 'New Item Name', 'ortimis' ),
			'add_new_item'               => __( 'Add New Item', 'ortimis' ),
			'edit_item'                  => __( 'Edit Item', 'ortimis' ),
			'update_item'                => __( 'Update Item', 'ortimis' ),
			'view_item'                  => __( 'View Item', 'ortimis' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'ortimis' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'ortimis' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'ortimis' ),
			'popular_items'              => __( 'Popular Items', 'ortimis' ),
			'search_items'               => __( 'Search Items', 'ortimis' ),
			'not_found'                  => __( 'Not Found', 'ortimis' ),
			'no_terms'                   => __( 'No items', 'ortimis' ),
			'items_list'                 => __( 'Items list', 'ortimis' ),
			'items_list_navigation'      => __( 'Items list navigation', 'ortimis' ),
		);
		$rewrite = array(
			'slug'                       => 'projektart',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'projektart', array( 'projects' ), $args );

	}


}
