<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage tradeup
 * @since tradeup
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
} ?>

<div id="page" class="site-wrapper">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tradeup' ); ?></a>

<?php 
$enable_topheader = get_theme_mod('tradeup_enable_top_header_section',true);
$enable_social_icon = get_theme_mod('tradeup_enable_social_top_header_section',true);
$facebook_link = get_theme_mod('tradeup_social_fb_button_link','#');
$twitter_link = get_theme_mod('tradeup_social_tw_button_link','#');
$instagram_link = get_theme_mod('tradeup_social_insta_button_link','#');
$linkedin_link = get_theme_mod('tradeup_social_lkdn_button_link','#');
$pinterest_link = get_theme_mod('tradeup_social_pint_button_link','#');
$youtube_link = get_theme_mod('tradeup_social_youtube_button_link','#');
$social_icon_target = get_theme_mod('tradeup_enable_new_tab_top_header_section',true);

$enable_contact = get_theme_mod('tradeup_enable_contact_top_header_section',true);
$contact_number = get_theme_mod('tradeup_contact_top_header_section','+1-200-196-348-24');
$enable_address = get_theme_mod('tradeup_enable_address_top_header_section',true);
$address = get_theme_mod('tradeup_address_top_header_section','272 California, USA');
$enable_timing = get_theme_mod('tradeup_enable_timing_top_header_section',true);
$timing = get_theme_mod('tradeup_timing_top_header_section','Mon - Sat: 8.00 - 18.00');
?>

	<header id="masthead" class="site-header">
    
    <?php if($enable_topheader) { ?>
    <div class="top-bar">
      <div class="container">
        <div class="row align-item-center">
          <div class="col-md-3">
            <?php if($enable_social_icon) { ?>
            <ul class="social-icon">
              
              <?php if($facebook_link != "") { ?>
                <li class="icon-list"><a href="<?php echo esc_url($facebook_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-facebook"></i></a></li>
              <?php } ?>

              <?php if($twitter_link != "") { ?>
                <li class="icon-list"><a href="<?php echo esc_url($twitter_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-twitter"></i></a></li>
              <?php } ?>

              <?php if($instagram_link != "") { ?>
                <li class="icon-list"><a href="<?php echo esc_url($instagram_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-instagram"></i></a></li>
              <?php } ?>

              <?php if($linkedin_link != "") { ?>
                <li class="icon-list"><a href="<?php echo esc_url($linkedin_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-linkedin"></i></a></li>
              <?php } ?>

              <?php if($pinterest_link != "") { ?>
                <li class="icon-list"><a href="<?php echo esc_url($pinterest_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-pinterest"></i></a></li>
              <?php } ?>

              <?php if($youtube_link != "") { ?>
                <li class="icon-list"><a href="<?php echo esc_url($youtube_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?> ><i class="fa fa-youtube"></i></a></li>
              <?php } ?>

            </ul>
          <?php } ?>
          </div>
          <div class="col-md-9 d-flex justify-content-end">
            
            <?php if($enable_contact) { ?>
            <div class="content">
              <div class="icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="details">
                <ul>
                  <li><p class="light"><?php echo esc_html($contact_number); ?></p></li>
                </ul>
              </div>
            </div>
            <?php } ?>

            <?php if($enable_address) { ?>
            <div class="content">
              <div class="icon">
                <i class="fa fa-location-arrow"></i>
              </div>
              <div class="details">
                <ul>
                  <li><p class="light"><?php echo esc_html($address); ?></p></li>
                </ul>
              </div>
            </div>
            <?php } ?>

            <?php if($enable_timing) { ?>
            <div class="content">
              <div class="icon">
                <i class="fa fa-clock-o"></i>
              </div>
              <div class="details">
                <ul>
                  <li><p class="light"><?php echo esc_html($timing); ?></p></li>
                </ul>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <div class="header-two affix">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="menu-two">
	              <div class="logo-wrap">
	                <div class="logo">
						
						<?php
						// Site Custom Logo
						if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						}
						?>

            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		        <?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description">
							<?php echo esc_html( $description ); ?>
						</p>
						<?php endif; ?>
	             </div>
	           </div>

            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'tradeup' ); ?>">

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
              <i class="fa fa-bars"></i>
            </button>

            <?php
              wp_nav_menu(
                  array(
                      'theme_location' => 'primary-menu',
                      'menu_id'        => 'primary-menu',
                  )
              );
              ?>
            </nav>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header end -->
  <div id="primary" class="site-content">