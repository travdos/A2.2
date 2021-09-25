<?php
/**
 * tradeup manage the Customizer sections.
 *
 * @subpackage tradeup
 * @since 1.0 
 */


/**
 * Top Header Options
 */
Kirki::add_section( 'tradeup_top_header_section_content', array(
	'title'    => __( 'Top Header Options', 'tradeup' ),
	'panel'    => 'tradeup_theme_options_panel',
	'description' => __( 'Personalize the settings top header.', 'tradeup' ),
	'priority' => 5,
) );

/**
 * General Options
 */
Kirki::add_section( 'tradeup_general_section_content', array(
	'title'    => __( 'General Options', 'tradeup' ),
	'panel'    => 'tradeup_theme_options_panel',
	'description' => __( 'Personalize the settings of your theme.', 'tradeup' ),
	'priority' => 8,
) );

/**
 * Layout Options
 */
Kirki::add_section( 'tradeup_layout_section_content', array(
	'title'    => __( 'Layout Options', 'tradeup' ),
	'panel'    => 'tradeup_theme_options_panel',
	'description' => __( 'Personalize the layout settings of your theme.', 'tradeup' ),
	'priority' => 10,
) );

/**
 * Blog Post Options
 */
Kirki::add_section( 'tradeup_blog_post_section_content', array(
	'title'    => __( 'Blog Post Options', 'tradeup' ),
	'panel'    => 'tradeup_theme_options_panel',
	'description' => __( 'Setting will also apply on archieve and search page.', 'tradeup' ),
	'priority' => 12,
) );

/**
 * Single Post Options
 */
Kirki::add_section( 'tradeup_single_post_section_content', array(
	'title'    => __( 'Single Post Options', 'tradeup' ),
	'panel'    => 'tradeup_theme_options_panel',
	'description' => __( 'Setting will apply on the content of single posts.', 'tradeup' ),
	'priority' => 14,
) );

/**
 * Footer Options
 */
Kirki::add_section( 'tradeup_footer_section_content', array(
	'title'    => __( 'Footer Options', 'tradeup' ),
	'panel'    => 'tradeup_theme_options_panel',
	'description' => __( 'Personalize the footer settings of your theme.', 'tradeup' ),
	'priority' => 16,
) );