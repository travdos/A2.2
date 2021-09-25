<?php
/* ------------------------------------------------------------------------- *
 *  Partial Template Functions
 *  ________________
 *
 *	If you want to add/edit functions please use a child theme
 *	http://codex.wordpress.org/Child_Themes
 *	________________
 *
/* ------------------------------------------------------------------------- */



/* ------------------------------------------------------------------------- *
 *  Header
/* ------------------------------------------------------------------------- */


/* -- Header placeholder */
if ( ! function_exists( 'tradeup_header_placeholder' ) ) {
	function tradeup_header_placeholder() {
		?><div class="mh-placeholder"></div><?php
	}
}


/* -- Logo setup  */
if ( ! function_exists( 'tradeup_logo_display' ) ) {
	function tradeup_logo_display( $footer = false ) {
		$header_text	= get_theme_mod( 'header_text', 1 );
		$custom_logo 	= get_theme_mod( 'custom_logo' );
		$logo_type 		= get_theme_mod( 'logo_type_select', 'logo-text-type' );
		$disabled		= get_theme_mod( 'footer_credits_logo_hide', false );
		$tag			= ( $footer ) ? 'div' : 'h1';
		$tag			= ( is_front_page() && is_home() && !$footer ) ? 'h1' : 'div';

		if( $header_text ) {
			if( $footer && $disabled )
				return;

			if( $custom_logo && $logo_type == 'logo-image-type' ) {

				// Image logo format
				$format = '<%1$s class="logo-wrap">%2$s</%1$s>';
				$output = sprintf( $format, $tag, get_custom_logo() );

				echo apply_filters( 'tradeup_logo___image', $output, $format, $tag );

			} else {

				// Text link format
				$format = '<%1$s class="logo-wrap"><a href="%2$s" rel="home" class="logo-text">%3$s</a></%1$s>';
				$output = sprintf( $format, $tag, esc_url( home_url('/') ), get_bloginfo( 'name', 'display' ) );

				echo apply_filters( 'tradeup_logo___text', $output, $format, $tag );

			}
		}
	}
}


/* -- Display main menu  */
if ( ! function_exists( 'tradeup_menu_main_area' ) ) {
	function tradeup_menu_main_area() {
		if( has_nav_menu( 'primary' ) ) {
		?>
		<nav class="main-menu-wrap" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'tradeup' ); ?>">
			<?php
                $menu_args = apply_filters( 'tradeup_menu___args', $menu_args = array(
                    'theme_location'    => 'primary',
					'items_wrap'        => '<ul class="main-menu clearfix">%3$s<li class="close-menu"><a href="#" class="ac-btn btn-small ac-btn-mobile-close">' . tradeup_icon( 'close', false ) . '</a></li></ul>',
                    'container'         => false,
                    'fallback_cb'       => 'tradeup_fb_menu'
                ) );

                wp_nav_menu( $menu_args );
            ?>
    	</nav>
		<?php
		}
	}
}


/* -- Wrapper for the right side menu */
if ( ! function_exists( 'tradeup_menu_actions_area' ) ) {
	function tradeup_menu_actions_area() {
		?>
        <div class="main-header-right clearfix">
        	<?php
			// Hooked: tradeup_menu_action_btns() - 11
			do_action( 'tradeup_header__action_btns_1' ); ?>

			<div class="main-header-btns">
            	<?php
				/* Hooked:
				tradeup_search_button() - 10
				tradeup_wco_cart_link() - 15
				tradeup_mobile_menu_button() - 20 */
				do_action( 'tradeup_header__action_btns_2' ); ?>
			</div>
        </div>
        <?php
	}
}


/* -- Action buttons menu - right side */
if ( ! function_exists( 'tradeup_menu_action_btns' ) ) {
	function tradeup_menu_action_btns() {

		$args = apply_filters( 'tradeup_menu___actions_args', array(
			'theme_location' => 'actions',
			'items_wrap'     => '<ul class="actions-menu clearfix">%3$s<li class="close-menu"><a href="#" class="ac-btn btn-small ac-btn-mobile-act-close">' . tradeup_icon( 'close', false ) . '</a></li></ul>',
			'container'      => false,
			'depth'          => 1,
			'fallback_cb'    => '__return_false',
			'echo'           => false,
		) );

		echo wp_nav_menu( $args );
	}
}


/* -- Action buttons - Search */
if ( ! function_exists( 'tradeup_search_button' ) ) {
	function tradeup_search_button() {
		$disabled = get_theme_mod( 'header_misc_hide_search_btn', false );
		if( ! $disabled ) : ?>
        <span class="ac-btn-h ac-btn-search"><a href="#" id="big-search-trigger"><?php tradeup_icon( 'search' ) ?></a></span>
        <?php endif;
	}
}


/* -- Action buttons - Mobile menu */
if ( ! function_exists( 'tradeup_mobile_menu_button' ) ) {
	function tradeup_mobile_menu_button() {
		$menu_btn = '';
		$btn_icon = 'bars';
		$format   = '<span class="ac-btn-h ac-btn-mobile ac-btn-mob"><a href="#" class="ac-btn-mobile-menu">%1$s%2$s</a></span>';

		if ( has_nav_menu( 'primary' ) ) :
			$output = sprintf( $format, tradeup_icon( $btn_icon, false ), esc_html( $menu_btn ) );
			echo apply_filters( 'tradeup_mobile_menu_button___output', $output, $format, $btn_icon, $menu_btn );
		endif;
	}
}


/* -- Action buttons - Mobile menu for actions */
if ( ! function_exists( 'tradeup_mobile_actions_menu_button' ) ) {
	function tradeup_mobile_actions_menu_button() {
		$menu_btn = '';
		$btn_icon = 'star';
		$format   = '<span class="ac-btn-h ac-btn-mobile ac-btn-act"><a href="#" class="ac-btn-mobile-actions-menu">%1$s%2$s</a></span>';

		if ( has_nav_menu( 'actions' ) ) :
			$output = sprintf( $format, tradeup_icon( $btn_icon, false ), esc_html( $menu_btn ) );
			echo apply_filters( 'tradeup_mobile_actions_menu_button___output', $output, $format, $btn_icon, $menu_btn );
		endif;
	}
}


/* -- Search overlay - when header search button is clicked */
if ( ! function_exists( 'tradeup_search_display' ) ) {
	function tradeup_search_display() {
		$disabled = get_theme_mod( 'header_misc_hide_search_btn', false );
		if( ! $disabled ) : ?>
		<div class="search-wrap">
			<a href="#" id="big-search-close" class="ac-btn btn-smallest"><?php tradeup_icon( 'close' ) ?></a>
			<?php get_search_form(); ?>
		</div> <?php endif;
	}
}




/* ------------------------------------------------------------------------- *
 *  Footer
/* ------------------------------------------------------------------------- */


/* -- Footer wrapper */
if ( ! function_exists( 'tradeup_footer_widgets_wrapper' ) ) {
	function tradeup_footer_widgets_wrapper() {
		$disabled = get_theme_mod( 'footer_sidebars_disable', false );
		if( ! $disabled ) :
		?>
        <div class="<?php tradeup_occ( 'tradeup_footer_widgets___wrapper_classes', array( 'footer-widgets' ) ) ?>">
        	<div class="<?php tradeup_occ( 'tradeup_footer_widgets___grid_classes', array( 'footer-sidebars', 'grid-1', 'clearfix' ) ) ?> <?php tradeup_anim_classes(); ?>">
            	<?php
					/*	Hooked:
					/*	tradeup_footer_sidebar_1() - 10
					/*	tradeup_footer_sidebar_2() - 20
					/*	tradeup_footer_sidebar_3() - 30
					/* --------------------------------------- */
					do_action( 'tradeup_footer__sidebars' );
				?>
            </div>
		</div>
        <?php
		endif;
	}
}


/* -- Footer sidebars */

// -- Footer Sidebar #1
if ( ! function_exists( 'tradeup_footer_sidebar_1' ) ) {
	function tradeup_footer_sidebar_1() {
		?>
        <div id="footer-sidebar-1" class="<?php tradeup_occ( 'tradeup_footer_sidebar___1_classes', array( 'grid-col', 'grid-2x3-col', 'footer-sidebar' ) ) ?>">
			<?php
            do_action( 'tradeup_footer_sidebar__1_top' );

                // Display widgets
                if ( is_active_sidebar( 'sidebar-footer-1' ) ) {
                    dynamic_sidebar( 'sidebar-footer-1' );
                } else {
					tradeup_footer_sidebars_demo_widgets( 'sidebar-footer-1' );
				}

            do_action( 'tradeup_footer_sidebar__1_bottom' );
            ?>
        </div>
        <?php
	}
}

// -- Footer Sidebar #2
if ( ! function_exists( 'tradeup_footer_sidebar_2' ) ) {
	function tradeup_footer_sidebar_2() {
		?>
        <div id="footer-sidebar-2" class="<?php tradeup_occ( 'tradeup_footer_sidebar___2_classes', array( 'grid-col', 'grid-2x3-col', 'footer-sidebar' ) ) ?>">
			<?php
            do_action( 'tradeup_footer_sidebar__2_top' );

                // Display widgets
                if ( is_active_sidebar( 'sidebar-footer-2' ) ) {
                    dynamic_sidebar( 'sidebar-footer-2' );
                } else {
					tradeup_footer_sidebars_demo_widgets( 'sidebar-footer-2' );
				}

            do_action( 'tradeup_footer_sidebar__2_bottom' );
            ?>
        </div>
        <?php
	}
}

// -- Footer Sidebar #3
if ( ! function_exists( 'tradeup_footer_sidebar_3' ) ) {
	function tradeup_footer_sidebar_3() {
		?>
        <div id="footer-sidebar-3" class="<?php tradeup_occ( 'tradeup_footer_sidebar___3_classes', array( 'grid-col', 'grid-2x3-col', 'footer-sidebar', 'last-col' ) ) ?>">
			<?php
            do_action( 'tradeup_footer_sidebar__3_top' );

                // Display widgets
                if ( is_active_sidebar( 'sidebar-footer-3' ) ) {
                    dynamic_sidebar( 'sidebar-footer-3' );
                } else {
					tradeup_footer_sidebars_demo_widgets( 'sidebar-footer-3' );
				}

            do_action( 'tradeup_footer_sidebar__3_bottom' );
            ?>
        </div>
        <?php
	}
}


/* -- Footer credits */

// -- Footer credits wrapper
if ( ! function_exists( 'tradeup_footer_creds_wrapper' ) ) {
	function tradeup_footer_creds_wrapper() {
		$disabled = get_theme_mod( 'footer_credits_disable', false);
		if( ! $disabled ) :
		?>
        <div class="footer-credits">
        	<div class="footer-creds clearfix">
            	<?php
				/*	Hooked:
				/*	tradeup_logo_display() - 10
				/*	tradeup_footer_creds_menu() - 20
				/*	tradeup_footer_creds_copyright() - 30
				/* --------------------------------------- */
				do_action( 'tradeup_footer__creds', true ) ?>
            </div>
		</div>
        <?php
		endif;
	}
}

// -- Footer credits - navigation/menu
if ( ! function_exists( 'tradeup_footer_creds_menu' ) ) {
	function tradeup_footer_creds_menu() {
		if( has_nav_menu( 'footer' ) ) {
		?>
        <nav class="footer-creds-menu-wrap" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'tradeup' ); ?>">
			<?php
                wp_nav_menu( apply_filters( 'tradeup_footer_creds___menu_args', array(
                    'theme_location'	=> 'footer',
                    'menu_class'     	=> 'footer-creds-menu clearfix"',
                    'container'			=> false,
					'fallback_cb'		=> 'tradeup_fb_menu',
                    'depth'				=> 1,
                 ) ) );
            ?>
        </nav>
        <?php
		}
	}
}

// -- Footer credits - copyright and credits
if ( ! function_exists( 'tradeup_footer_creds_copyright' ) ) {
	function tradeup_footer_creds_copyright() {
		$allowed = apply_filters( 'tradeup_theme_credits___allowed', array(
			'a' => array(
				'href' 	=> array(),
				'title' => array()
			),
		) );
		$copyright = get_theme_mod( 'footer_credits_creds_line', tradeup_return_copyright_templ() );
		?>
        <div class="footer-creds-copyright">
        	<span>
				<span class="footer-copyright"><?php if( $copyright != '' ) { echo tradeup_content_filter( $copyright, $allowed ); } ?></span>
				<?php
				$show = apply_filters( 'tradeup_theme_credits___show', true );
				if( $show ) {
					printf( esc_html_x( '%1$s designed by %2$s.', 'credit text', 'tradeup' ),
						esc_html_x( 'tradeup theme', 'credit text - theme', 'tradeup' ),
						'<a href="' . esc_url( TRADEUP_AC_URL ) . '" title="' . esc_attr__( 'Premium WordPress Themes &amp; Plugins ', 'tradeup' ) . '">' . esc_html_x( 'Tradeup', 'credit text - theme author', 'tradeup' ) . '</a>'
					);
				}
				?>
			</span>
        </div>
        <?php
	}
}




/* ------------------------------------------------------------------------- *
 *  Posts & Pages
/* ------------------------------------------------------------------------- */

/* -- Posts & pages pagination */
if ( ! function_exists( 'tradeup_post_page_pagination' ) ) {
	function tradeup_post_page_pagination() {
		if( is_single() || is_page() ) {
			echo wp_link_pages( tradeup_paged_post_args() ); }
	}
}

/* -- Display post tags */
if ( ! function_exists( 'tradeup_single_tags_display' ) ) {
	function tradeup_single_tags_display() {
		$hide 		= get_theme_mod( 'posts_single_tags_bottom', false );
		$before 	= apply_filters( 'tradeup_single_tags_display___before',  '<strong class="tags-before">' . tradeup_icon( 'tags', false ) . esc_html__( 'Tagged with: ', 'tradeup' ) . '</strong>' );
		$sep 		= apply_filters( 'tradeup_single_tags_display___sep', " &#8226; " );
		$after		= apply_filters( 'tradeup_single_tags_display___after', '' );
		$tags		= get_the_tags();
		if( is_single() && ! $hide && ! empty( $tags ) ) {
			?>
            	<div class="tags-display">
                	<?php the_tags( $before, $sep, $after ); ?>
                </div>
            <?php
		}
	}
}

/* -- Single post meta info */
if ( ! function_exists( 'tradeup_post_meta_display' ) ) {
	function tradeup_post_meta_display( $show ) {
		$single_author = get_theme_mod( 'posts_single_hide_meta_author', false );
		$single_date = get_theme_mod( 'posts_single_hide_meta_date', false );
		$single_category = get_theme_mod( 'posts_single_hide_meta_category', false );
		$index_readmore = get_theme_mod( 'posts_index_hide_meta_read_more', false );
		$index_date = get_theme_mod( 'posts_index_hide_meta_date', false );
		$index_category = get_theme_mod( 'posts_index_hide_meta_category', false );

		if( is_single() ) {
			if( $single_author ) {
				$show['author']['show'] = false; }
			if( $single_date ) {
				$show['date']['show'] = false; }
			if( $single_category ) {
				$show['category']['show'] = false; }
		} else {
			if( $index_readmore ) {
				$show['more']['show'] = false; }
			if( $index_date ) {
				$show['date']['show'] = false; }
			if( $index_category ) {
				$show['category']['show'] = false; }
		}

		return $show;
	}
}
add_filter( 'tradeup_post_meta___show', 'tradeup_post_meta_display' );

/* -- Index post meta footer */
if ( ! function_exists( 'tradeup_index_post_meta_footer' ) ) {
	function tradeup_index_post_meta_footer() {
		?>
        <footer class="entry-meta">
        	<ul class="entry-meta-list clearfix">
            	<?php
				/*	Hooked:
				/*	tradeup_post_meta() - 10
				/* --------------------------------------- */
				do_action( 'tradeup_index__post_meta' ); ?>
            </ul>
		</footer>
        <?php
	}
}




/* ------------------------------------------------------------------------- *
 * Portfolio
/* ------------------------------------------------------------------------- */

if( tradeup_jetpack_check( 'custom-content-types' ) ) : // Check if Jetpack is active

/* -- Display project tags */
if ( ! function_exists( 'tradeup_portfolio_tags_display' ) ) {
	function tradeup_portfolio_tags_display() {
		global $post;
		$display 	= true;
		$before 	= apply_filters( 'tradeup_single_tags_display___before',  '<strong class="tags-before">' . tradeup_icon( 'tags', false ) . esc_html__( 'Tagged with: ', 'tradeup' ) . '</strong>' );
		$sep 		= apply_filters( 'tradeup_single_tags_display___sep', " &#8226; " );
		$after		= apply_filters( 'tradeup_single_tags_display___after', '' );
		$output		= get_the_term_list( $post->ID, 'jetpack-portfolio-tag', $before, $sep, $after );
		if( $display && ! empty( $output ) ) {
			?>
            	<div class="tags-display">
                	<?php echo wp_kses_post( $output ); ?>
                </div>
            <?php
		}
	}
}

/* -- Output masonry sizers */
if ( ! function_exists( 'tradeup_portfolio_page_masonry_sizers' ) ) {
	function tradeup_portfolio_page_masonry_sizers() {
		$output = '';
		$output .= '<div class="sec-portfolio-grid-sizer"></div>';
		$output .= '<div class="sec-portfolio-gutter-sizer"></div>';
		$new_output = apply_filters( 'tradeup_portfolio_page_masonry___sizers', $output );

		echo wp_kses_post( $new_output );
	}
}

/* -- Masonry script for Portfolio */
if ( ! function_exists( 'tradeup_portfolio_page_masonry_script' ) ) {
	function tradeup_portfolio_page_masonry_script() {
		$id = apply_filters( 'tradeup_portfolio_page_masonry_script___id', 'sec-portfolio-wrap' );
		wp_add_inline_script( 'jquery-masonry', '(function( $ ) { $( document ).ready(function() { var $sec_portwrap = $("#' . esc_attr( $id ) . ' ").masonry(); $sec_portwrap.imagesLoaded( function() { $sec_portwrap.masonry(); }); });})(jQuery);' );
	}
}

endif; // Jetpack check



/* ------------------------------------------------------------------------- *
 *  WooCommerce
/* ------------------------------------------------------------------------- */

if( tradeup_wco_is_activated() ) {

/* -- Change number or products per row to 3 */
if ( ! function_exists( 'tradeup_wco_loop_columns' ) ) {
	function tradeup_wco_loop_columns() {
		return ( ! tradeup_hide_sidebar( 'product' ) ) ? 3 : 4;
	}
}

/* -- Related products */
if ( ! function_exists( 'tradeup_wco_related_loop_columns' ) ) {
	function tradeup_wco_related_loop_columns( $args ) {
		$cols = ( ! tradeup_hide_sidebar( 'product' ) ) ? 3 : 4;

		$args['posts_per_page'] = apply_filters( 'tradeup_wco_filter_related___ppp', $cols );
		$args['columns'] = apply_filters( 'tradeup_wco_filter_related___columns', $cols );

		return $args;
	}
}

/* Before shop loop */
if ( ! function_exists( 'tradeup_wco_before_shop_loop_start' ) ) {
	function tradeup_wco_before_shop_loop_start() {
		echo '<div class="before-shop-loop clearfix">';
	}
}

if ( ! function_exists( 'tradeup_wco_before_shop_loop_end' ) ) {
	function tradeup_wco_before_shop_loop_end() {
		echo '</div>';
	}
}

/* Shopping Cart */
if ( ! function_exists( 'tradeup_wco_cart_link_fragment' ) ) {
	function tradeup_wco_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		tradeup_wco_cart_link();
		$fragments['span.shopping-button'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'tradeup_wco_cart_link' ) ) {
	function tradeup_wco_cart_link() {
		if( ! get_theme_mod( 'woocommerce_cart_disable', 0 ) ) {
		?>
		<span class="ac-btn-h shopping-button ac-btn-mobile">
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'tradeup' ); ?>">
				<?php tradeup_icon( 'shopping-bag' ) ?><span class="count"><?php echo absint( WC()->cart->get_cart_contents_count() ); ?></span>
			</a>
		</span>
		<?php
		}
	}
}

} // WooCommerce Activated/Exists
