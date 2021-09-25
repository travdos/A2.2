<?php
/* ------------------------------------------------------------------------- *
 *  Partial Template CSS classes
 *  ________________
 *
 *	If you want to add/edit functions please use a child theme
 *	http://codex.wordpress.org/Child_Themes
 *	________________
 *
 *	Check this function: tradeup_occ() in ../tradeup-controls/functions/helpers.php
 *	________________
 *
/* ------------------------------------------------------------------------- */



/* ------------------------------------------------------------------------- *
 *	Header classes
 *	__________
 *
 *  Add some classes based on some conditions
 *	For sticky or unsticky :)
/* ------------------------------------------------------------------------- */
if ( ! function_exists( 'tradeup_header_classes' ) ) {
	function tradeup_header_classes( $echo = true ) {
		$classes = array();
		$default = apply_filters( 'tradeup_option___header_type_select_default', 'menu-tf' );
		$style = get_theme_mod( 'header_type_select', $default );
		$classes[] = 'main-header';

		switch( $style ) {
			case 'menu-tf' : // Fixed & transparent
				$classes[] = 'mh-fixed';
				$classes[] = 'mh-transparent';
				break;
			case 'menu-ff' : // Fixed & non-transparent
				$classes[] = 'mh-fixed';
				$classes[] = 'mh-nontransparent';
				break;
			case 'menu-tn' : // Transparent & non-sticky
				$classes[] = 'mh-transparent';
				break;
			case 'menu-nn' : // Non-transparent & non-sticky
				$classes[] = 'mh-nontransparent';
				break;
		}

		$css_classes = array_map( 'esc_attr', array_unique( apply_filters( 'tradeup_header___css_classes', $classes ) ) );

		$new_classes = join( ' ', $css_classes );

		if( $echo ) {
			echo 'class="' . $new_classes . '"';
		} else {
			return 'class="' . $new_classes . '"';
		}

	}
}

// -- Header inner wrap
if ( ! function_exists( 'tradeup_header_inner_wrap_classes' ) ) {
	function tradeup_header_inner_wrap_classes( $classes ) {
		$classes[] = 'main-header-inner-wrap';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_header___inner_wrap', 'tradeup_header_inner_wrap_classes' );




/* ------------------------------------------------------------------------- *
 *	body_class
 *	__________
 *
 *  Add some classes based on some conditions
/* ------------------------------------------------------------------------- */
if ( ! function_exists( 'tradeup_body_classes' ) ) {
	function tradeup_body_classes( $classes ) {
		$new_classes = array();

		// Sidebar options
		if( tradeup_hide_sidebar( 'single' ) ) {
			$new_classes[] = 'no-sidebar';
		}
		if( tradeup_hide_sidebar( 'page' ) ) {
			$new_classes[] = 'no-sidebar';
		}
		if( tradeup_hide_sidebar( 'portfolio' ) ) {
			$new_classes[] = 'no-sidebar';
		}
		if( tradeup_hide_sidebar( 'product' ) ) {
			$new_classes[] = 'no-sidebar';
		}

		// WooCommerce
		if( ! get_theme_mod( 'woocommerce_cart_disable', 0 ) ) {
			$new_classes[] = 'has-cart-btn';
		}

		//$new_classes[] = 'fader-reset'; // ADD OPTION

		// Sticky logo
		if( get_theme_mod( 'sticky_logo', false ) ) {
			$new_classes[] = 'sticky-logo';
		}

		// From select a header type
		$header_type = get_theme_mod( 'header_type_select', 'menu-tf' );
		switch( $header_type ) {
			// Transparent sticky
			case 'menu-tf' :
			$new_classes[] = $header_type;
			// Colored sticky
			case 'menu-ff' :
			$new_classes[] = $header_type;
			// Transparent
			case 'menu-tn' :
			$new_classes[] = $header_type;
			// Colored
			case 'menu-nn' :
			$new_classes[] = $header_type;
		}

		$new_classes = apply_filters( 'tradeup_body_classes_filter', $new_classes );

		$classes = array_map( 'esc_attr', array_unique( array_merge( $classes, $new_classes ) ) );

		return $classes;
	}
}
add_filter( 'body_class', 'tradeup_body_classes' );




/* ------------------------------------------------------------------------- *
 *	body_class & Header classes
 *	__________
 *
 *  If the current page has some sort of full width page.
/* ------------------------------------------------------------------------- */
if( ! function_exists( 'tradeup_header_page_fw_css_classes' ) ) {
	function tradeup_header_page_fw_css_classes( $classes ) {
		if( is_page_template( 'template-fullwidth.php' ) ) {
			$current_page = get_queried_object_id();
			$classes = array();
			$classes[] = 'main-header';
			$classes[] = 'mh-fixed';
			$classes[] = 'mh-nontransparent';
			return apply_filters( 'tradeup_header_page_fw___css_classes', $classes, $current_page );
		} else {
			return $classes;
		}
	}
}
add_filter( 'tradeup_header___css_classes', 'tradeup_header_page_fw_css_classes', 11 );

if( ! function_exists( 'tradeup_body_page_fw_classes_filter' ) ) {
	function tradeup_body_page_fw_classes_filter( $new_classes ) {
		if( is_page_template( 'template-fullwidth.php' ) ) {
			$current_page = get_queried_object_id();
			$new_classes = array();
			$new_classes[] = 'menu-ff';
			return apply_filters( 'tradeup_body_page_fw___classes_filter', $new_classes, $current_page );
		} else {
			return $new_classes;
		}
	}
}
add_filter( 'tradeup_body_classes_filter', 'tradeup_body_page_fw_classes_filter', 11 );




/* ------------------------------------------------------------------------- *
 *	post_class
 *	__________
 *
 *  Add some classes based on some conditions
/* ------------------------------------------------------------------------- */
if ( ! function_exists( 'tradeup_post_classes' ) ) {
	function tradeup_post_classes( $classes ) {
		$new_classes = array();
		$new_classes[] = 'clearfix';

		if( ! is_single() && ! is_page() ) {
			$new_classes[] = 'post-index';

			// Sharedaddy classes
			if( tradeup_jetpack_check( 'sharedaddy' ) && tradeup_sharedaddy_type_check( 'index' ) ) {
				$new_classes[] = 'sd-index-on';
			}
		} else {
			$new_classes[] = 'post-single';
		}

		if( is_page_template( 'template-blog.php' ) ) {
			$remove = array_search( 'post-single', $new_classes );
			unset( $new_classes[$remove] );
			$new_classes[] = 'post-index';
		}

		$new_classes = apply_filters( 'tradeup_post_classes___filter', $new_classes );

		$classes = array_map( 'esc_attr', array_merge( $classes, $new_classes ) );

		return $classes;
	}
}
add_filter( 'post_class', 'tradeup_post_classes' );




/* ------------------------------------------------------------------------- *
 *  Index - index.php
/* ------------------------------------------------------------------------- */

// -- Section classes
if ( ! function_exists( 'tradeup_index_section_classes' ) ) {
	function tradeup_index_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		return $classes;
	}
}
add_filter( 'tradeup_index___section_classes', 'tradeup_index_section_classes' );

// -- Container classes
if ( ! function_exists( 'tradeup_index_container_classes' ) ) {
	function tradeup_index_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'grid-1';
		$classes[] = 'padding-small';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_index___container_classes', 'tradeup_index_container_classes' );

// -- Main classes
if ( ! function_exists( 'tradeup_index_main_classes' ) ) {
	function tradeup_index_main_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-posts-col';
		$classes[] = 'site-main';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_index___main_classes', 'tradeup_index_main_classes' );




/* ------------------------------------------------------------------------- *
 *  Single - single.php
/* ------------------------------------------------------------------------- */

// -- Section classes
if ( ! function_exists( 'tradeup_single_section_classes' ) ) {
	function tradeup_single_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		return $classes;
	}
}
add_filter( 'tradeup_single___section_classes', 'tradeup_single_section_classes' );

// -- Container classes
if ( ! function_exists( 'tradeup_single_container_classes' ) ) {
	function tradeup_single_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'grid-1';
		$classes[] = 'padding-small';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_single___container_classes', 'tradeup_single_container_classes' );

// -- Main classes
if ( ! function_exists( 'tradeup_single_main_classes' ) ) {
	function tradeup_single_main_classes( $classes ) {
		$classes[] = 'grid-col';
		if( ! tradeup_hide_sidebar( 'single' ) ) {
			$classes[] = 'grid-posts-col'; } else {
			$classes[] = 'grid-4x-col'; }
		$classes[] = 'site-single';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_single___main_classes', 'tradeup_single_main_classes' );




/* ------------------------------------------------------------------------- *
 *  Page - page.php
/* ------------------------------------------------------------------------- */

// -- Section classes
if ( ! function_exists( 'tradeup_page_section_classes' ) ) {
	function tradeup_page_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		return $classes;
	}
}
add_filter( 'tradeup_page___section_classes', 'tradeup_page_section_classes' );

// -- Container classes
if ( ! function_exists( 'tradeup_page_container_classes' ) ) {
	function tradeup_page_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'grid-1';
		$classes[] = 'padding-small';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_page___container_classes', 'tradeup_page_container_classes' );

// -- Main classes
if ( ! function_exists( 'tradeup_page_main_classes' ) ) {
	function tradeup_page_main_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-posts-col';
		$classes[] = 'site-page';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_page___main_classes', 'tradeup_page_main_classes' );




/* ------------------------------------------------------------------------- *
 *  Portfolio:
 *		template-jetpack-portfolio.php
 *		single-jetpack-portfolio.php
/* ------------------------------------------------------------------------- */

if( tradeup_jetpack_check( 'custom-content-types' ) ) : // Check if Jetpack is active

// -- Section classes
if ( ! function_exists( 'tradeup_portfolio_section_classes' ) ) {
	function tradeup_portfolio_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		return $classes;
	}
}
add_filter( 'tradeup_portfolio___section_classes', 'tradeup_portfolio_section_classes' );

if ( ! function_exists( 'tradeup_portfolio_page_section_classes' ) ) {
	function tradeup_portfolio_page_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		$classes[] = 'sec-portfolio';
		return $classes;
	}
}
add_filter( 'tradeup_portfolio_page___section_classes', 'tradeup_portfolio_page_section_classes' );

// -- Container classes
if ( ! function_exists( 'tradeup_portfolio_container_classes' ) ) {
	function tradeup_portfolio_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'grid-1';
		$classes[] = 'padding-small';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_portfolio___container_classes', 'tradeup_portfolio_container_classes' );

if ( ! function_exists( 'tradeup_portfolio_page_container_classes' ) ) {
	function tradeup_portfolio_page_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'grid-2';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_portfolio_page___container_classes', 'tradeup_portfolio_page_container_classes' );

// -- Portfolio page wrap classes
if ( ! function_exists( 'tradeup_portfolio_page_wrap_classes' ) ) {
	function tradeup_portfolio_page_wrap_classes( $classes ) {
		$classes[] = 'js-masonry';
		$classes[] = 'grid-masonry-wrap';
		return $classes;
	}
}
add_filter( 'tradeup_portfolio_page___wrap_classes', 'tradeup_portfolio_page_wrap_classes' );

// -- Main classes
if ( ! function_exists( 'tradeup_portfolio_main_classes' ) ) {
	function tradeup_portfolio_main_classes( $classes ) {
		$classes[] = 'grid-col';
		if( ! tradeup_hide_sidebar( 'portfolio' ) ) {
			$classes[] = 'grid-posts-col'; } else {
			$classes[] = 'grid-4x-col'; }
		$classes[] = 'site-portfolio';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_portfolio___main_classes', 'tradeup_portfolio_main_classes' );

endif; // Jetpack Check




/* ------------------------------------------------------------------------- *
 *  404 Page - 404.php
/* ------------------------------------------------------------------------- */

// -- Section classes
if ( ! function_exists( 'tradeup_404_section_classes' ) ) {
	function tradeup_404_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		return $classes;
	}
}
add_filter( 'tradeup_404___section_classes', 'tradeup_404_section_classes' );

// -- Container classes
if ( ! function_exists( 'tradeup_404_container_classes' ) ) {
	function tradeup_404_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'grid-1';
		$classes[] = 'padding-small';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_404___container_classes', 'tradeup_404_container_classes' );

// -- Main classes
if ( ! function_exists( 'tradeup_404_main_classes' ) ) {
	function tradeup_404_main_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-4x-col';
		$classes[] = 'site-404';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_404___main_classes', 'tradeup_404_main_classes' );




/* ------------------------------------------------------------------------- *
 *  Search Page - search.php
/* ------------------------------------------------------------------------- */

// -- Section classes
if ( ! function_exists( 'tradeup_search_section_classes' ) ) {
	function tradeup_search_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		return $classes;
	}
}
add_filter( 'tradeup_search___section_classes', 'tradeup_search_section_classes' );

// -- Container classes
if ( ! function_exists( 'tradeup_search_container_classes' ) ) {
	function tradeup_search_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'grid-1';
		$classes[] = 'padding-small';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_search___container_classes', 'tradeup_search_container_classes' );

// -- Main classes
if ( ! function_exists( 'tradeup_search_main_classes' ) ) {
	function tradeup_search_main_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-posts-col';
		$classes[] = 'site-search';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_search___main_classes', 'tradeup_search_main_classes' );




/* ------------------------------------------------------------------------- *
 *  Sidebars
/* ------------------------------------------------------------------------- */

// -- Default sidebar
if ( ! function_exists( 'tradeup_sidebar_default_classes' ) ) {
	function tradeup_sidebar_default_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-sidebar-col';
		$classes[] = 'last-col';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_sidebar___default_classes', 'tradeup_sidebar_default_classes' );

// -- Single sidebar
if ( ! function_exists( 'tradeup_sidebar_single_classes' ) ) {
	function tradeup_sidebar_single_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-sidebar-col';
		$classes[] = 'last-col';
		$classes[] = 'sidebar';
		$classes[] = 'sidebar-single';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_sidebar___single_classes', 'tradeup_sidebar_single_classes' );

// -- Shop sidebar
if( tradeup_wco_is_activated() ) {

if ( ! function_exists( 'tradeup_sidebar_shop_classes' ) ) {
	function tradeup_sidebar_shop_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-sidebar-col';
		$classes[] = 'last-col';
		$classes[] = 'sidebar';
		$classes[] = 'sidebar-shop';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_sidebar___shop_classes', 'tradeup_sidebar_shop_classes' );

}

// -- Page sidebar
if ( ! function_exists( 'tradeup_sidebar_page_classes' ) ) {
	function tradeup_sidebar_page_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-sidebar-col';
		$classes[] = 'last-col';
		$classes[] = 'sidebar';
		$classes[] = 'sidebar-page';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_sidebar___page_classes', 'tradeup_sidebar_page_classes' );

// -- Portfolio sidebar
if ( ! function_exists( 'tradeup_sidebar_portfolio_classes' ) ) {
	function tradeup_sidebar_portfolio_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-sidebar-col';
		$classes[] = 'last-col';
		$classes[] = 'sidebar';
		$classes[] = 'sidebar-portfolio';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_sidebar___portfolio_classes', 'tradeup_sidebar_portfolio_classes' );



/* ------------------------------------------------------------------------- *
 *  Animations
/* ------------------------------------------------------------------------- */

// -- Index/Archives pages
if ( ! function_exists( 'tradeup_index_archives_animations' ) ) {
	function tradeup_index_archives_animations( $new_classes ) {
		$anim = tradeup_anim_classes( true );
		$anim_classes = array();

		if( $anim != '' ) {
			$anim_classes = explode( ' ', $anim );
		}

		if( ! is_single() && ! is_page() ) {
			foreach( $anim_classes as $key => $value ) {
				$new_classes[] = $value;
			}
		}

		return $new_classes;
	}
}
add_filter( 'tradeup_post_classes___filter', 'tradeup_index_archives_animations' );



/* ------------------------------------------------------------------------- *
 *  WooCommerce
/* ------------------------------------------------------------------------- */

// -- woocommerce\archive-product.php Main classes
if ( ! function_exists( 'tradeup_wc_archive_main_classes' ) ) {
	function tradeup_wc_archive_main_classes( $classes ) {
		$classes[] = 'grid-col';
		$classes[] = 'grid-woocommerce-col';
		$classes[] = 'site-main';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_wc_archive___main_classes', 'tradeup_wc_archive_main_classes' );

// -- woocommerce\single-product.php Main classes
if ( ! function_exists( 'tradeup_wc_single_main_classes' ) ) {
	function tradeup_wc_single_main_classes( $classes ) {
		$classes[] = 'grid-col';
		if( ! tradeup_hide_sidebar( 'single' ) ) {
			$classes[] = 'grid-posts-col'; } else {
			$classes[] = 'grid-4x-col'; }
		$classes[] = 'site-wc-single';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_wc_single___main_classes', 'tradeup_wc_single_main_classes' );

// -- woocommerce\global\wrapper-start.php Section classes
if ( ! function_exists( 'tradeup_wc_wrapper_section_classes' ) ) {
	function tradeup_wc_wrapper_section_classes( $classes ) {
		$classes[] = 'grid-wrap';
		$classes[] = 'gw-woocommerce';
		return $classes;
	}
}
add_filter( 'tradeup_wc_wrapper___section_classes', 'tradeup_wc_wrapper_section_classes' );

// -- woocommerce\global\wrapper-start.php Container classes
if ( ! function_exists( 'tradeup_wc_wrapper_container_classes' ) ) {
	function tradeup_wc_wrapper_container_classes( $classes ) {
		$classes[] = 'grid-container';
		$classes[] = 'gc-woocommerce';
		$classes[] = 'grid-1';
		$classes[] = 'padding-small';
		$classes[] = 'clearfix';
		return $classes;
	}
}
add_filter( 'tradeup_wc_wrapper___container_classes', 'tradeup_wc_wrapper_container_classes' );
