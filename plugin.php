<?php
/*
Plugin Name: Custom Post Type Podcasts
Plugin URI: http://horttcore.de
Description: A custom post type for managing podcasts
Version: 1.0
Author: Ralf Hortt
Author URI: https://horttcore.de
License: GPL2
Text Domain: custom-post-type-podcasts
*/

require( 'classes/custom-post-type-podcasts.php' );

if ( is_admin() )
	require( 'classes/custom-post-type-podcasts.admin.php' );
