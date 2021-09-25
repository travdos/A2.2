<?php
/**
 * tradeup manage the Customizer options of general panel.
 *
 * @subpackage tradeup
 * @since 1.0 
 */
Kirki::add_field(
	'tradeup_config', array(
		'type'        => 'checkbox',
		'settings'    => 'tradeup_home_posts',
		'label'       => esc_attr__( 'Checked to hide latest posts in homepage.', 'tradeup' ),
		'section'     => 'static_front_page',
		'default'     => true,
	)
);