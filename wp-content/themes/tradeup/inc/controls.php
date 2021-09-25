<?php 
/**
 * excerpt lenth.
 */
if (!function_exists('tradeup_custom_excerpt_length')) :
    function tradeup_custom_excerpt_length($length)
    {
        if (is_admin()) {
            return $length;
        }

        $excpt_length = get_theme_mod('tradeup_excerpt_general_section','55');
        if (!empty($excpt_length)) {
            return $excpt_length;
        }
        return 55;
    }
endif;
add_filter('excerpt_length', 'tradeup_custom_excerpt_length');

function tradeup_excerpt_more( $more ) {
	if ( is_admin() ) {
		$more = '...';
   		return $more;
   	}
}
add_filter('excerpt_more', 'tradeup_excerpt_more');

function tradeup_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

function tradeup_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count";
}
function tradeup_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}