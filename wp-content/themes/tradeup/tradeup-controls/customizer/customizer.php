<?php
/* ------------------------------------------------------------------------- *
 *  Customizer
 *  ________________
 *
 *	This file registers options for the Customizer
 *	________________
 *
/* ------------------------------------------------------------------------- */

/*  Register Customizer options
/* ------------------------------------ */
if ( ! function_exists( 'tradeup_customize_register_new' ) ) {
	function tradeup_customize_register_new( $wp_customize ) {

		// Custom Controls
		require_once( TRADEUP_CUSTOMIZER_PATH . 'controls/rgba/rgba-picker.php' ); // RGBA Color Picker
		require_once( TRADEUP_CUSTOMIZER_PATH . 'controls/info/info.php' ); // Info control
		require_once( TRADEUP_CUSTOMIZER_PATH . 'controls/button/button.php' ); // Button control
		require_once( TRADEUP_CUSTOMIZER_PATH . 'controls/link/link.php' ); // Link section
		require_once( TRADEUP_CUSTOMIZER_PATH . 'controls/recommend/recommend.php' ); // Recommend Tradeup Extensions

		// Register custom sections
		$wp_customize->register_section_type( 'Tradeup_Section_Link' );
		$wp_customize->register_section_type( 'Tradeup_Installer_Section' );

		// Add postMessage support for site title and description for the Customizer
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.logo-text',
				'container_inclusive' => false,
				'render_callback' => 'tradeup_customize_partial_blogname',
			) );
		}


			/*  Add panels
			/* ------------------------------------ */

			// Colors
			$wp_customize->add_panel( 'colors_options', array(
			  'title' 				=> __( 'Colors', 'tradeup' ),
			  'priority'			=> 38,
			) );

			// Settings
			$wp_customize->add_panel( 'settings_options', array(
			  'title' 				=> __( 'Settings', 'tradeup' ),
			  'priority'			=> 39,
			) );


			/*  Add sections
			/* ------------------------------------ */

			require_once( TRADEUP_CUSTOMIZER_PATH . 'sections/docs-button.php' ); // Documentation button
			require_once( TRADEUP_CUSTOMIZER_PATH . 'sections/recommend.php' ); // Tradeup Extensions Recommendation

	} // tradeup_customize_register_new() END
}
add_action( 'customize_register', 'tradeup_customize_register_new', 11 );


/*  Including the rest of Customizer functions
/* ------------------------------------------- */

// Options & defaults
require_once( TRADEUP_CUSTOMIZER_PATH . 'options.php' );

// Output CSS for Previewer templating
require_once( TRADEUP_CUSTOMIZER_PATH . 'preview-css-tmpl.php' );

// Output inline styles
require_once( TRADEUP_CUSTOMIZER_PATH . 'inline-styles.php' );

// Enqueue Customizer styles/scripts
require_once( TRADEUP_CUSTOMIZER_PATH . 'enqueue.php' );

// Wrappers for Customizer methods
require_once( TRADEUP_CUSTOMIZER_PATH . 'controllers.php' );

// Partials for selective refresh
require_once( TRADEUP_CUSTOMIZER_PATH . 'partials.php' );