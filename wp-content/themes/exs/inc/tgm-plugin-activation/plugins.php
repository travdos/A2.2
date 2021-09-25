<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme ExS for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */

require_once EXS_THEME_PATH . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

//required plugins arrays - default and additional for different demos
if ( ! function_exists( 'exs_get_required_plugins_array' ) ) :
	function exs_get_required_plugins_array( $exs_index = 'default', $exs_all = false, $exs_all_flat = false ) {
		$exs_required_plugins_array = apply_filters(
			'exs_required_plugins_array',
			array(
				//Following plugins are required for all demo contents:
				'default' => array(
					array(
						'name'        => esc_html__( esc_html__( 'WordPress SEO by Yoast', 'exs' ), 'exs' ),
						'slug'        => 'wordpress-seo',
						'is_callable' => 'wpseo_init',
					),
					array(
						'name'     => esc_html__( 'ExS Widgets', 'exs' ),
						'slug'     => 'exs-widgets',
					),
					array(
						'name'     => esc_html__( 'Advanced Import: ExS Theme Demo Contents', 'exs' ),
						'slug'     => 'advanced-import',
					),
				),
			)
		);
		if ( ! empty( $exs_all_flat ) ) {
			$exs_required_plugins_array_all = array();
			foreach ( $exs_required_plugins_array as $key => $plugins ) {
				foreach ( $plugins as $plugin ) {
					$exs_required_plugins_array_all[ $plugin['slug'] ] = $plugin;
				}
			}

			return $exs_required_plugins_array_all;
		} elseif ( ! empty( $exs_all ) ) {
			return $exs_required_plugins_array;
		} else {
			return $exs_required_plugins_array[ $exs_index ];
		}
	}
endif; //exs_get_required_plugins_array

add_action( 'tgmpa_register', 'exs_register_required_plugins' );
if ( ! function_exists( 'exs_register_required_plugins' ) ) :
	/**
	 * Register the required plugins for this theme.
	 *
	 * The variables passed to the `tgmpa()` function should be:
	 * - an array of plugin arrays;
	 * - optionally a configuration array.
	 * If you are not changing anything in the configuration array, you can remove the array and remove the
	 * variable from the function call: `tgmpa( $exs_plugins );`.
	 * In that case, the TGMPA default settings will be used.
	 *
	 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
	 */
	function exs_register_required_plugins() {
		/*
		* Array of plugin arrays. Required keys are name and slug.
		* If the source is NOT from the .org repo, then source is also required.
		*/
		//we need this to install different plugins for different demos
		if ( ! empty( $_POST['exs_all_plugins'] ) ) {
			$exs_plugins = exs_get_required_plugins_array( '', false, true );
		} else {
			$exs_plugins = exs_get_required_plugins_array();
		}
		tgmpa(
			$exs_plugins,
			array(
				'domain'       => 'exs',
				'dismissable'  => true,
				'is_automatic' => false,
			)
		);
	}
endif;

//prevent redirects
remove_action( 'bp_admin_init', 'bp_do_activation_redirect', 1 );

///////////////////
//ADVANCED IMPORT//
///////////////////
if ( ! function_exists( 'exs_demo_import_filter_post_ids' ) ) :
	function exs_demo_import_filter_post_ids( $ids ){
		//reusable block
		$ids[] = 'block_id';
		return $ids;
	}
endif;
add_filter( 'advanced_import_replace_post_ids', 'exs_demo_import_filter_post_ids' );
if ( ! function_exists( 'exs_demo_import_filter_term_ids' ) ) :
	function exs_demo_import_filter_term_ids( $ids ){
		//exs widgets
		$ids[] = 'cat';
		$ids[] = 'category';
		return $ids;
	}
endif;
add_filter( 'advanced_import_replace_term_ids', 'exs_demo_import_filter_term_ids' );

//new advanced export-import demo contents
if ( ! function_exists( 'exs_demo_import_lists' ) ) :
	function exs_demo_import_lists(){

		//if the main plugin file is different from plugin slug
		//'main_file' => 'wp-seo.php',
		$demo_lists = array(
			'knowledgebase'    => array(
				'title'          => esc_html__( 'Knowledgebase', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/knowledgebase/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/knowledgebase/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/knowledgebase/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/08/knowledgebase-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/knowledgebase/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'docs', 'documentation' ),
				'categories'     => array( 'documentation' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
				),
			),
			'news'             => array(
				'title'          => esc_html__( 'News', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/news/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/news/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/news/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/05/demo-blog.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/news/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'news', 'blog' ),
				'categories'     => array( 'news', 'blog' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
				),
			),
			'business'         => array(
				'title'          => esc_html__( 'Business', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/business/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/business/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/business/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/05/demo-business.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/business/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'business', 'agency', 'company', 'personal' ),
				'categories'     => array( 'business' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
				),
			),
			'shop'             => array(
				'title'          => esc_html__( 'Shop', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/shop/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/shop/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/shop/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/05/demo-shop.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/shop/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'shop', 'ecommerce', 'woocommerce' ),
				'categories'     => array( 'ecommerce' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'WooCommerce', 'exs' ),
						'slug' => 'woocommerce',

					),
					array(
						'name'      => esc_html__( 'YITH WooCommerce Wishlist', 'exs' ),
						'slug'      => 'yith-woocommerce-wishlist',
						'main_file' => 'init.php',
					),
					array(
						'name'      => esc_html__( 'YITH WooCommerce Quick View', 'exs' ),
						'slug'      => 'yith-woocommerce-quick-view',
						'main_file' => 'init.php',
					),
				),
			),
			'edd'              => array(
				'title'          => esc_html__( 'Easy Digital Downloads', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/edd/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/edd/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/edd/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/08/edd-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/edd/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'edd', 'shop', 'ecommerce' ),
				'categories'     => array( 'ecommerce' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'Easy Digital Downloads', 'exs' ),
						'slug' => 'easy-digital-downloads',
					),
				),
			),
			'bbpress'          => array(
				'title'          => esc_html__( 'bbPress', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/bbpress/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/bbpress/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/bbpress/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/08/bbpress-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/bbpress/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'social', 'bbpress', 'forum' ),
				'categories'     => array( 'social' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'bbPress', 'exs' ),
						'slug' => 'bbpress',
					),
				),
			),
			'wp-job-manager'   => array(
				'title'          => esc_html__( 'WP Job Manager', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/wp-job-manager/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/wp-job-manager/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/wp-job-manager/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/09/exs-wp-job-manager-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/wp-job-manager/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'jobs', 'job manager', 'wp job manager' ),
				'categories'     => array( 'jobs' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'WP Job Manager', 'exs' ),
						'slug' => 'wp-job-manager',
					),
				),
			),
			'buddypress'       => array(
				'title'          => esc_html__( 'BuddyPress', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/buddypress/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/buddypress/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/buddypress/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/09/buddypress-exs-theme-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/buddypress/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'social', 'buddypress', 'social' ),
				'categories'     => array( 'social' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'bbPress', 'exs' ),
						'slug' => 'bbpress',
					),
					array(
						'name' => esc_html__( 'BuddyPress', 'exs' ),
						'slug' => 'buddypress',
						'main_file' => 'bp-loader.php',
					),
				),
			),
			'simple-job-board' => array(
				'title'          => esc_html__( 'Simple Job Board', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/simple-job-board/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/simple-job-board/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/simple-job-board/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/09/simple-job-board-exs-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/simple-job-board/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'jobs', 'job manager', 'simple job board' ),
				'categories'     => array( 'jobs' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'Simple Job Board', 'exs' ),
						'slug' => 'simple-job-board',
					),
				),
			),
			'likes-views'      => array(
				'title'          => esc_html__( 'Likes and Views', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/likes-views/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/likes-views/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/likes-views/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/09/likes-dislikes-exs-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/likes-views/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'blog', 'news', 'video', 'likes', 'views' ),
				'categories'     => array( 'blog' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'Comments Like Dislike', 'exs' ),
						'slug' => 'comments-like-dislike',
					),
					array(
						'name' => esc_html__( 'Post Views Counter', 'exs' ),
						'slug' => 'post-views-counter',
					),
					array(
						'name' => esc_html__( 'Posts Like Dislike', 'exs' ),
						'slug' => 'posts-like-dislike',
					),
				),
			),
			'ultimate-member'  => array(
				'title'          => esc_html__( 'Ultimate Member', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/ultimate-member/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/ultimate-member/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/ultimate-member/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/09/exs-ultimate-member-demo.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/ultimate-member/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'social', 'membership', 'member', 'ultimate member' ),
				'categories'     => array( 'social' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'Ultimate Member', 'exs' ),
						'slug' => 'ultimate-member',
					),
				),
			),
			'events-calendar'  => array(
				'title'          => esc_html__( 'The Events Calendar', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/events-calendar/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/events-calendar/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/events-calendar/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2020/12/exs-theme-events-calendar.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/events-calendar/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'events', 'calendar', 'event calendar' ),
				'categories'     => array( 'events' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'The Events Calendar', 'exs' ),
						'slug' => 'the-events-calendar',
					),
				),
			),
			'video'            => array(
				'title'          => esc_html__( 'Video', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/news/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/news/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/news/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2021/01/exs-video-demo-preview.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/video/',
				'is_pro'         => true,
				'pro_url'        => 'https://exsthemewp.com/download/',
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'blog', 'news', 'video', 'likes', 'views' ),
				'categories'     => array( 'blog' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'Comments Like Dislike', 'exs' ),
						'slug' => 'comments-like-dislike',
					),
					array(
						'name' => esc_html__( 'Post Views Counter', 'exs' ),
						'slug' => 'post-views-counter',
					),
					array(
						'name' => esc_html__( 'Posts Like Dislike', 'exs' ),
						'slug' => 'posts-like-dislike',
					),
				),
			),
			'learnpress'       => array(
				'title'          => esc_html__( 'LearnPress', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/learnpress/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/learnpress/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/learnpress/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2021/02/exs-learnpress-demo-preview.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/learnpress/',
				'is_pro'         => false,
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'courses', 'learning', 'learnpress', 'online courses' ),
				'categories'     => array( 'courses' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'LearnPress', 'exs' ),
						'slug' => 'learnpress',
					),
				),
			),
			'exs-shop'         => array(
				'title'          => esc_html__( 'ExS Shop', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/shop/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/shop/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/shop/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2021/06/exs-shop-screenshot.jpg',
				'demo_url'       => 'https://demos.exsthemewp.com/parent-shop/',
				'is_pro'         => true,
				'pro_url'        => 'https://exsthemewp.com/download/',
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'shop', 'ecommerce', 'woocommerce' ),
				'categories'     => array( 'ecommerce' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
					array(
						'name' => esc_html__( 'WooCommerce', 'exs' ),
						'slug' => 'woocommerce',

					),
					array(
						'name'      => esc_html__( 'YITH WooCommerce Wishlist', 'exs' ),
						'slug'      => 'yith-woocommerce-wishlist',
						'main_file' => 'init.php',
					),
					array(
						'name'      => esc_html__( 'YITH WooCommerce Quick View', 'exs' ),
						'slug'      => 'yith-woocommerce-quick-view',
						'main_file' => 'init.php',
					),
				),
			),
			'exs-news'         => array(
				'title'          => esc_html__( 'ExS News', 'exs' ),
				'template_url'   => array(
					'content' => 'https://cdn.exsthemewp.com/demos-ai/news/content.json',
					'options' => 'https://cdn.exsthemewp.com/demos-ai/news/options.json',
					'widgets' => 'https://cdn.exsthemewp.com/demos-ai/news/widgets.json',
				),
				'screenshot_url' => 'https://exsthemewp.com/wp-content/uploads/2021/04/exs-news-screenshot.png',
				'demo_url'       => 'https://demos.exsthemewp.com/parent-news/',
				'is_pro'         => true,
				'pro_url'        => 'https://exsthemewp.com/download/',
				'type'           => 'gutenberg',
				'author'         => esc_html__( 'ExS', 'exs' ),
				'keywords'       => array( 'blog', 'news', 'video' ),
				'categories'     => array( 'news' ),
				'plugins'        => array(
					array(
						'name' => esc_html__( 'ExS Widgets', 'exs' ),
						'slug' => 'exs-widgets',
					),
					array(
						'name'      => esc_html__( 'WordPress SEO by Yoast', 'exs' ),
						'slug'      => 'wordpress-seo',
						'main_file' => 'wp-seo.php',
					),
				),
			),
		);
		return apply_filters( 'exs_demo_import_lists_filter', $demo_lists );
	}
endif;
add_filter('advanced_import_demo_lists','exs_demo_import_lists');
