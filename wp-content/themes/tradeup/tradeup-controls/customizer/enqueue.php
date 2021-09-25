<?php
/* ------------------------------------------- */
/*  Enqueue Customizer specific scripts/styles
/* ------------------------------------------- */


/*  Customizer JS/CSS
/* ------------------------------------ */
if ( ! function_exists( 'tradeup_customizer_js_css' ) ) {
	function tradeup_customizer_js_css() {
		global $tradeup_customizer_settings;

		// Customizer Hacks
		wp_enqueue_style( 'tradeup-customizer-style', get_template_directory_uri() . '/assets/css/admin/customizer.css', array(), '20160412', 'all' );
		wp_enqueue_script( 'tradeup-customizer-js', get_template_directory_uri() . '/assets/js/admin/customizer.js', array(), '20160412', true );
		wp_localize_script( 'tradeup-customizer-js', 'tradeup_customizer_js_vars',
			apply_filters( 'tradeup_customizer_js___vars', array(
				'admin_ajax'	=> esc_url( admin_url('admin-ajax.php') ),
				'dismiss_ext_nonce' => wp_create_nonce( 'tradeup_dismiss_ext_nonce' )
			) )
		);

		// Settings Manager
		wp_enqueue_script( 'tradeup-customizer-settings', get_template_directory_uri() . '/assets/js/admin/customizer-settings.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20160412', true );
		wp_localize_script( 'tradeup-customizer-settings', 'tu_customizer_settings', $tradeup_customizer_settings );

	}
}
add_action( 'customize_controls_enqueue_scripts', 'tradeup_customizer_js_css' );


if ( ! function_exists( 'tradeup_customizer_preview_js' ) ) {
	function tradeup_customizer_preview_js() {
		wp_enqueue_script( 'tradeup-customize-preview', get_template_directory_uri() . '/assets/js/admin/customize-preview.js', array( 'customize-preview' ), '20160412', true );
	}
}
add_action( 'customize_preview_init', 'tradeup_customizer_preview_js' );