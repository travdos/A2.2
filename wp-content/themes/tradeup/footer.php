<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage tradeup
 * @since tradeup 1.0
 */

?>
</div><!-- #content -->

<?php 
$enable_copyright = get_theme_mod('tradeup_enable_cpright_footer_section',true);
$copyright_content = get_theme_mod('tradeup_cpright_footer_section','Powered by WordPress');
$enable_logo = get_theme_mod('tradeup_enable_logo_footer_section',true);

$footer_title = get_theme_mod('tradeup_title_footer_section','TAKE OWNERSHIP OF YOUR BRAND');
$footer_description = get_theme_mod('tradeup_description_footer_section','Finally, a partner that handles the heavy lifting for you.');

$show_fsocial = get_theme_mod('tradeup_enable_social_footer_section',true);
$facebook_link = get_theme_mod('tradeup_social_fb_button_link_footer','#');
$instagram_link = get_theme_mod('tradeup_social_insta_button_link_footer','#');
$linkedin_link = get_theme_mod('tradeup_social_lkdn_button_link_footer','#');
$social_icon_target = get_theme_mod('tradeup_enable_new_tab_footer_section',true);


?>

	<footer class="footer footer-one">
        <div class="foot-top">
            <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <?php if($enable_logo) { ?>
                    <div class="logo">
                      <?php
                      // Site Custom Logo
                      if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                      }
                      ?>
                    </div>
                  <?php } ?>
                  </div>
                  <div class="col-md-6">
                    <h2><?php echo esc_html($footer_title); ?></h2>
                    <p class="desc"><?php echo esc_html($footer_description); ?></p>
                  </div>
                  <div class="col-md-9 menu-link">
                  <?php if(has_nav_menu('footer-menu')) { ?>
                      <?php
                      wp_nav_menu(
                          array(
                              'theme_location' => 'footer-menu',
                              'menu_id'        => 'footer-menu',
                          )
                      );
                      ?>
                  <?php } ?>
                  </div>
                  <div class="col-md-3 social-icon">

                    <?php if($show_fsocial) { ?>
                    <ul>
                      <?php if($facebook_link != "") { ?>
                        <li><a href="<?php echo esc_url($facebook_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-facebook-official"></i></a></li>
                      <?php } ?>

                      <?php if($instagram_link != "") { ?>
                       <li><a href="<?php echo esc_url($instagram_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-instagram"></i></a></li>
                      <?php } ?>

                      <?php if($linkedin_link != "") { ?>
                        <li><a href="<?php echo esc_url($linkedin_link); ?>" <?php if($social_icon_target) { ?> target="_blank" <?php } ?>><i class="fa fa-linkedin-square"></i></a></li>
                      <?php } ?>
                    </ul>
                    <?php } ?>
                    
                    <?php if($enable_copyright) { ?>
                     
                        <div class="footer-credits">

                          <p class="footer-copyright">&copy;
                            <?php
                            echo esc_html(date_i18n(
                              /* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
                              _x( 'Y', 'copyright date format', 'tradeup' )
                            ));
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                          </p><!-- .footer-copyright -->

                          <p class="powered-by">
                            <?php if($copyright_content == ""){ ?>
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tradeup' ) ); ?>">
                              <?php esc_html_e( 'Powered by WordPress', 'tradeup' ); ?>
                            </a>
                          <?php } else { ?>
                            <?php echo esc_html($copyright_content); ?>
                          <?php } ?>
                          </p><!-- .powered-by -->

                        </div><!-- .footer-credits -->
                    <?php } ?>

                  </div>
                  
                  <div class="col-md-12">
                    <h1 class="heading-con">
                      <?php esc_html_e('Start a conversation','tradeup'); ?>
                    </h1>
                  </div>

                  <?php if ( is_active_sidebar( 'footer-widgets' ) ) { ?>
                  <div class="container">
                      <div class="footer-top">
                          <div class="row clearfix">
                              <?php dynamic_sidebar('footer-widgets'); ?>      
                          </div>
                      </div>
                  </div>
              <?php } ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== Go to top ====== -->
    <a id="c-scroll" title="Go to top" href="javascript:void(0)">
      TOP
    </a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>