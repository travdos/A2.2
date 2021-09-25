<?php
/* ------------------------------------ */
/*  Custom links
/* ------------------------------------ */

/// Documentation
$wp_customize->add_section( new Tradeup_Section_Link( $wp_customize, 'link-button', array(
	'title'     => esc_html__( 'Tradeup', 'tradeup' ),
	'link_text' => esc_html__( 'Documentation', 'tradeup' ),
	'link_url'  => esc_url( TRADEUP_AC_DOCS_URL ),
	'rate_text' => esc_html__( 'Leave a review', 'tradeup' ),
	'rate_url'  => 'https://wordpress.org/themes/tradeup/',
	'priority'  => 1
) ) );
