<?php
/**
 * tradeup manage the Customizer panels.
 *
 * @subpackage tradeup
 * @since 1.0 
 */

/**
 * General Settings Panel
 */
Kirki::add_panel( 'tradeup_general_panel', array(
	'priority' => 10,
	'title'    => __( 'General Settings', 'tradeup' ),
) );


/**
 * Frontpage Settings Panel
 */
Kirki::add_panel( 'tradeup_theme_options_panel', array(
	'priority' => 20,
	'title'    => __( 'Tradeup Theme Options', 'tradeup' ),
) );