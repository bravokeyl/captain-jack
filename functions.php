<?php
include_once( get_template_directory() . '/lib/init.php' );
//include_once( get_stylesheet_directory() . '/lib/settings.php' );

define('CHILD_THEME_NAME','captain-jack');
define('CHILD_THEME_VERSION','1.0');

add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'genesis-menus', array( 'primary' => 'Primary Menu' ) );
add_theme_support( 'genesis-footer-widgets', 2 );

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//Remove unused sidebars
unregister_sidebar( 'sidebar-alt' );
//unregister_sidebar( 'header-right' );

// Remove unused Page Layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-content' );

add_filter( 'widget_text', 'do_shortcode' );

// Remove Edit link
add_filter( 'genesis_edit_post_link', '__return_false' );

add_action( 'wp_enqueue_scripts', 'spi_enqueue_scripts_styles' ,10);
function spi_enqueue_scripts_styles() {

	wp_enqueue_script( 'spi-custom', get_stylesheet_directory_uri().'/js/spi.js', array( 'jquery' ), null , true );
	
	wp_enqueue_style( 'spi-font', "//fonts.googleapis.com/css?family=Roboto:400,700", array(), null );

	//wp_enqueue_style( 'spi-fa', get_stylesheet_directory_uri().'/lib/fa/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'spi-app', get_stylesheet_directory_uri().'/css/spi.css', array(), null );

	wp_dequeue_style('captain-jack');

}

remove_action('genesis_footer','genesis_do_footer');