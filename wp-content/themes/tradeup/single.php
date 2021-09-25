<?php
/**
 * The template for displaying all single posts
 *
 *
 * @subpackage tradeup
 * @since tradeup
 */

get_header();
?>
<?php
    $sidebar_layout = get_theme_mod('tradeup_sidebar_layout_section', 'right');
    if ($sidebar_layout == 'left') {
        $sidebar_layout = 'has-left-sidebar';
    } elseif ($sidebar_layout == 'right') {
        $sidebar_layout = 'has-right-sidebar';
    } elseif ($sidebar_layout == 'no') {
        $sidebar_layout = 'no-sidebar';
    }
?>

<?php
	if ( have_posts() ) : ?>

	<!-- blog detail start-->
    <div class="sp-100 bg-w">
        <div class="container">
            <div class="row <?php echo esc_attr($sidebar_layout); ?>">
                
                <?php if( is_active_sidebar( 'sidebar-1' ) ){ ?>
                        <div class="col-lg-8">
                <?php }else{ ?>
                        <div class="col-lg-12">
                <?php } ?>
                    
                    <?php while ( have_posts() ) : the_post(); tradeup_set_post_view(); ?>
						<?php get_template_part( 'template-parts/content', 'single' ); 
						if ( comments_open() || '0' != get_comments_number() ) :
						comments_template(); 
						endif;?>
						
					<?php endwhile; ?>

                </div>
                
                <?php
                if (($sidebar_layout == 'has-left-sidebar') || ($sidebar_layout == 'has-right-sidebar')) { ?>
                    <div class="col-lg-4">
                    <aside class="sidebar mt-5 mt-lg-0">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
    <!-- blog detail ends-->

<?php 	
	endif;
	?>	

<?php
get_footer();