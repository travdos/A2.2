<?php
/* ---------------------------------------- */
/*  Tradeup Extensions Installer Notice
/* ---------------------------------------- */

if ( ! tradeup_check_exts_state() ) :
	if ( tradeup_installer_sec_callback() ) :
	$wp_customize->add_section( new Tradeup_Installer_Section( $wp_customize, 'tuext-installer', array(
		'title'     => esc_html_x( 'Recommended Plugin:', 'Customizer Extensions Installer', 'tradeup' ),
		'plugin'    => esc_html_x( 'Tradeup Extensions', 'Customizer Extensions Installer', 'tradeup' ),
		'notice'    => array(
							'p1' => esc_html_x( 'If you want to take full advantage of all the options this theme has to offer', 'Customizer Extensions Installer', 'tradeup' ),
							'p2' => esc_html_x( 'please install and activate', 'Customizer Extensions Installer', 'tradeup' ),
						),
		'docs'      => array(
							'url'  => esc_url( TRADEUP_AC_DOCS_URL ),
							'text' => esc_html_x( '(Front Page sections)', 'Customizer Extensions Installer', 'tradeup' ),
						),
		'install'   => array(
							'slug' => 'tradeup-extensions',
							'aria' => esc_attr_x( 'Install Tradeup Extensions Now', 'Customizer Extensions Installer', 'tradeup' ),
							'name' => esc_attr_x( 'Tradeup Extensions', 'Customizer Extensions Installer', 'tradeup' ),
							'text' => esc_attr_x( 'Install Now', 'Customizer Extensions Installer', 'tradeup' ),
						),
		'dismiss'   => array(
							'id'   => 'tu-dismiss-rec-plugin',
							'aria' => esc_attr_x( 'Dismiss Installer Message', 'Customizer Extensions Installer', 'tradeup' ),
							'text' => esc_attr_x( 'Dismiss', 'Customizer Extensions Installer', 'tradeup' ),
						),
		'active'    => array(
							'check' => (bool) tradeup_check_exts_installed(),
							'msg'   => esc_attr_x( 'The plugin is installed but not activated.', 'Customizer Extensions Installer', 'tradeup' ),
							'url'   => esc_url( admin_url( 'plugins.php' ) ),
							'btn'   => esc_attr_x( 'Activate Plugin', 'Customizer Extensions Installer', 'tradeup' ),
						),
		'priority'  => 0
	) ) );
	endif;
endif;