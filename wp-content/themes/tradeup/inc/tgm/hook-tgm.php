<?php
/**
 * Recommended plugins
 *
 * @package tradeup
 */

if ( ! function_exists( 'tradeup_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function tradeup_recommended_plugins() {

        $plugins = array(              
          
            array(
                'name'     => esc_html__( 'Jetpack – WP Security, Backup, Speed, & Growth', 'tradeup' ),
                'slug'     => 'jetpack',
                'required' => true,
            ),

            array(
                'name'     => esc_html__( 'Tradeup Extensions', 'tradeup' ),
                'slug'     => 'tradeup-extensions',
                'required' => true,
            ),
			array(
                'name'     => esc_html__( 'FlipBox Builder', 'tradeup' ),
                'slug'     => 'flipbox-builder',
                'required' => true,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'tradeup_recommended_plugins' );