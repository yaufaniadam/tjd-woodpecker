<?php
require('inc/better-excerpts.php');
require('inc/wp_bootstrap_navwalker.php');
require_once('inc/cpt.php');

if ( ! function_exists( 'bws_setup' ) ) :
function bws_setup() {

	load_theme_textdomain( 'bws', get_template_directory() . '/languages' );
	
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
		
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'slider', 1400, 450, true );
	add_image_size( 'large', 800, 600, true );
	add_image_size( 'medium', 640, 480, true );
	add_image_size( 'small', 320, 240, true );
	add_image_size( 'thumbnail', 150, 150,true );

	register_nav_menus( array(
		'top'   => __( 'Top additional menu', 'bws' ),
		'primary'   => __( 'Top primary menu', 'bws' ),		
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // bws_setup
add_action( 'after_setup_theme', 'bws_setup' );

add_filter( 'wp_enqueue_scripts', 'bws_scripts',0 );
function bws_scripts() {	
	// css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/3rdparty/bootstrap/css/bootstrap.min.css', array(), '1.0' );		
	wp_enqueue_style( 'bws-style', get_stylesheet_uri(), array( 'bootstrap' ) );	
	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/3rdparty/bxslider/jquery.bxslider.css', array(), '1.0' );
	
	// js	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/3rdparty/bxslider/jquery.bxslider.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/3rdparty/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0',true );	
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );
}

function bws_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'bws' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'bws_wp_title', 10, 2 );

//Register Sidebars
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Single',
		'id' => 'single',
		'description' => 'Widget on Single page.',
		'before_widget' => '<section class="%2$s widgets" id="%1$s">',
		'after_widget' => '</nav></section>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3><nav>',
	));
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer',
		'description' => 'Widget on Footer.',
		'before_widget' => '<div class="%2$s widgets" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
}