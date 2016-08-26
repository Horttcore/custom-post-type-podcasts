<?php
/**
 *
 *  Custom Post Type Podcast
 *
 */
class Custom_Post_Type_Podcast
{



	/**
	 * Plugin constructor
	 *
	 * @access public
	 * @author Ralf Hortt <me@horttcore.de>
	 * @since v1.0.0
	 **/
	public function __construct()
	{

		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

	} // end __construct



	/**
	 * Load plugin translation
	 *
	 * @access public
	 * @return void
	 * @author Ralf Hortt <me@horttcore.de>
	 * @since v1.0.0
	 **/
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain( 'custom-post-type-podcasts', false, dirname( plugin_basename( __FILE__ ) ) . '/../languages/'  );

	} // end load_plugin_textdomain



	/**
	 *
	 * Register post type
	 *
	 * @access public
	 * @author Ralf Hortt <me@horttcore.de>
 	 * @since v1.0.0
	 */
	public function register_post_type()
	{

		$args = array(
			'labels' => array(
				'name' => _x( 'Podcasts', 'post type general name', 'custom-post-type-podcasts' ),
				'singular_name' => _x( 'Podcast', 'post type singular name', 'custom-post-type-podcasts' ),
				'add_new' => _x( 'Add New', 'podcast', 'custom-post-type-podcasts' ),
				'add_new_item' => __( 'Add New podcast', 'custom-post-type-podcasts' ),
				'edit_item' => __( 'Edit podcast', 'custom-post-type-podcasts' ),
				'new_item' => __( 'New podcast', 'custom-post-type-podcasts' ),
				'view_item' => __( 'View podcast', 'custom-post-type-podcasts' ),
				'search_items' => __( 'Search podcasts', 'custom-post-type-podcasts' ),
				'not_found' =>  __( 'No podcasts found', 'custom-post-type-podcasts' ),
				'not_found_in_trash' => __( 'No podcasts found in Trash', 'custom-post-type-podcasts' ),
				'parent_item_colon' => '',
				'menu_name' => __( 'Podcasts', 'custom-post-type-podcasts' )
			),
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'query_var' => TRUE,
			'rewrite' => array(
				'slug' => _x( 'podcasts', 'post type slug', 'custom-post-type-podcasts' ),
				'with_front' => FALSE,
			),
			'capability_type' => 'post',
			'has_archive' => FALSE,
			'hierarchical' => FALSE,
			'menu_position' => null,
			'show_in_nav_menus' => FALSE,
			'menu_icon' => 'dashicons-microphone',
			'supports' => array( 'title', 'editor' )
		);

		register_post_type( 'podcast', $args);

	} // end register_post_type



}

new Custom_Post_Type_Podcast;
