<?php
/**
 * tradeup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @subpackage tradeup
 * @since tradeup 1.0
 */

if ( ! defined( 'TRADEUP_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TRADEUP_VERSION', '1.0.5' );
}

if ( ! function_exists( 'tradeup_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tradeup_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tradeup, use a find and replace
		 * to change 'tradeup' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tradeup', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// woocommerce support
		
		add_theme_support( 'woocommerce' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'tradeup' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'tradeup' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'tradeup_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'tradeup_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tradeup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tradeup_content_width', 640 );
}
add_action( 'after_setup_theme', 'tradeup_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tradeup_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tradeup' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tradeup' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'tradeup' ),
			'id'            => 'footer-widgets',
			'description'   => esc_html__( 'Add widgets here.', 'tradeup' ),
			'before_widget' => '<div class="%2$s footer-widget col-md-3 col-sm-6 col-xs-12">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(
		array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'tradeup' ),
			'id'            => 'woocommerce-widgets',
			'description'   => esc_html__( 'Add widgets here.', 'tradeup' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	}
}
add_action( 'widgets_init', 'tradeup_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tradeup_scripts() {

    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('tradeup-header-css', get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style('magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css');
    wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');
    wp_enqueue_style('owl-theme-default-css', get_template_directory_uri() . '/assets/css/owl.theme.default.css');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css');
    wp_enqueue_style('tradeup-home-style-css', get_template_directory_uri() . '/assets/css/home8style.css');
    wp_enqueue_style('tradeup-responsive-css', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('tradeup-skin-css', get_template_directory_uri() . '/assets/css/skin-2.css');
    wp_enqueue_style('tradeup-custom-css', get_template_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style('tradeup-woocommerce-css', get_template_directory_uri() . '/assets/css/tradeup-woocommerce.css');

	wp_enqueue_style( 'tradeup-style', get_stylesheet_uri(), array(), TRADEUP_VERSION );
	wp_style_add_data( 'tradeup-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tradeup-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), TRADEUP_VERSION, true );

	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.js',array('jquery'), TRADEUP_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js',array(), TRADEUP_VERSION, true );
	wp_enqueue_script( 'owl-carouel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js',array(), TRADEUP_VERSION, true );
	wp_enqueue_script( 'jquery-magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js',array(), TRADEUP_VERSION, true );
	wp_enqueue_script( 'tradeup-custom-js', get_template_directory_uri() . '/assets/js/custom.js',array(), TRADEUP_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tradeup_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/controls.php';

/**
 * Add feature in Customizer  
 */
require get_template_directory() . '/inc/customizer/cv-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory()  . '/inc/tgm/class-tgm-plugin-activation.php';
require get_template_directory(). '/inc/tgm/hook-tgm.php';


/*tradeup-controls*/
if( ! defined( 'TRADEUP_AC_URL' ) ) {
	define( 'TRADEUP_AC_URL', 'http://testerwp.com/docs/tradeup-theme-doc/' ); }

if( ! defined( 'TRADEUP_AC_DOCS_URL' ) && defined( 'TRADEUP_AC_URL' ) ) {
	define( 'TRADEUP_AC_DOCS_URL', TRADEUP_AC_URL . 'documentation/tradeup/' ); }
if( ! defined( 'TRADEUP_CUSTOMIZER_PATH' ) ) {
	define( 'TRADEUP_CUSTOMIZER_PATH', trailingslashit( get_template_directory() ) . 'tradeup-controls/customizer/' ); }
if( ! defined( 'TRADEUP_FUNCTIONS_PATH' ) ) {
	define( 'TRADEUP_FUNCTIONS_PATH', trailingslashit( get_template_directory() ) . 'tradeup-controls/functions/' ); }
if( ! defined( 'TRADEUP_PARTIALS_PATH' ) ) {
	define( 'TRADEUP_PARTIALS_PATH', trailingslashit( get_template_directory() ) . 'tradeup-controls/partials/' ); }

require_once ( TRADEUP_CUSTOMIZER_PATH . 'customizer.php' );
require_once ( TRADEUP_FUNCTIONS_PATH . 'sanitization.php' );
require_once ( TRADEUP_FUNCTIONS_PATH . 'helpers.php' );

require_once ( TRADEUP_PARTIALS_PATH . 'partial-template-helpers.php' );

/**
 * Customizer additional settings.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/custom-addition/class-customize.php' );