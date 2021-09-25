<?php
/* ------------------------------------------------------------------------- *
 * Template name: Homepage
/* ------------------------------------------------------------------------- */

// Header and Footer templates
$tradeup_header_tmpl = apply_filters( 'tradeup_header___tmpl', '' );
$tradeup_footer_tmpl = apply_filters( 'tradeup_footer___tmpl', '' );

// Header
get_header( $tradeup_header_tmpl );

	if( has_action( 'tradeup_new_frontpage_sections' ) ) :
		/*
		A way for Tradeup Extensions to hook
		and display sections on the front page;
		-----------
		hooked:
		tradeup_extensions_display_sections() - 10
		*/
		do_action( 'tradeup_new_frontpage_sections' );
	else :
		tradeup_get_heading_templ( 'index', 'no-sections' );
	endif;

// Footer
get_footer( $tradeup_footer_tmpl );