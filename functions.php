<?php
/**
 * ClintonWarren functions and definitions
 *
 * @package ClintonWarren
 * @since ClintonWarren 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since ClintonWarren 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'ClintonWarren_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since ClintonWarren 1.0
 */
function ClintonWarren_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on ClintonWarren, use a find and replace
	 * to change 'ClintonWarren' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ClintonWarren', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ClintonWarren' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // ClintonWarren_setup
add_action( 'after_setup_theme', 'ClintonWarren_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since ClintonWarren 1.0
 */
function ClintonWarren_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'ClintonWarren' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'ClintonWarren_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function ClintonWarren_scripts() {
	
	wp_register_script('foundation.min', get_template_directory_uri(). '/js/foundation.min.js', array( 'jquery') );
	wp_register_script('foundation.app', get_template_directory_uri(). '/js/app.js', array( 'jquery') );
	wp_register_script('foundation.accordion', get_template_directory_uri(). '/js/jquery.foundation.accordion.js', array( 'jquery') );
	wp_register_script('foundation.alerts', get_template_directory_uri(). '/js/jquery.foundation.alerts.js', array( 'jquery') );
	wp_register_script('foundation.buttons', get_template_directory_uri(). '/js/jquery.foundation.buttons.js', array( 'jquery') );
	wp_register_script('foundation.mediaquery', get_template_directory_uri(). '/js/jquery.foundation.mediaQueryToggle.js', array( 'jquery') );
	wp_register_script('foundation.tabs', get_template_directory_uri(). '/js/jquery.foundation.tabs.js', array( 'jquery') );
	wp_register_script('superfish', get_template_directory_uri(). '/js/superfish.js' , array('jquery') );
	wp_register_script('supersubs', get_template_directory_uri(). '/js/supersubs.js', array('jquery') );
	wp_register_script('hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array('jquery')) ;
	wp_register_script('bgiframe', get_template_directory_uri() . '/js/jquery.bgiframe.min.js', array('jquery'));
	wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'));
	
	
	wp_enqueue_script('foundation.min');
	wp_enqueue_script('foundation.accordion');
	wp_enqueue_script('foundation.alerts');
	wp_enqueue_script('foundation.buttons');
	wp_enqueue_script('foundation.mediaquery');
	
	wp_enqueue_script('foundation.tabs');
	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script('foundation.app');
	wp_enqueue_script('superfish');
	wp_enqueue_script('supersubs');
	wp_enqueue_script('hoverintent');
	wp_enqueue_script('bgiframe');
	wp_enqueue_script('script');
	
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'foundation' , get_template_directory_uri() . '/css/foundation.min.css');
	wp_enqueue_style( 'foundation.app' , get_template_directory_uri() . '/css/app.css');
	wp_enqueue_style( 'superfish', get_template_directory_uri() . '/css/superfish.css');
	
	
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'ClintonWarren_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
