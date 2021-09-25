<?php
/**
 * Template part for displaying posts
 *
 *
 * @subpackage tradeup
 * @since 1.0 
 */

?>
<?php 
$enable_author = get_theme_mod('tradeup_enable_author_blog_section',true);
$enable_date = get_theme_mod('tradeup_enable_date_blog_section',true); 
$enable_comment = get_theme_mod('tradeup_enable_comment_blog_section',true); 
$enable_visit = get_theme_mod('tradeup_enable_vcount_blog_section',true);
$enable_image = get_theme_mod('tradeup_enable_fimage_blog_section',true); 
?>


    <article class="blog-item blog-2" id="post-<?php the_ID(); ?>">
        <?php if($enable_image) { ?>
        <div class="post-img">
            <?php
	        if(has_post_thumbnail()){
	         	the_post_thumbnail(); 
	        } ?>
            
            <?php if($enable_date) { ?>
            <div class="date">
                <p>
                    <span><?php tradeup_posted_on(); ?></span>
                </p>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        
        <?php if($enable_author || $enable_comment ||$enable_visit){ ?>
        <ul class="post-meta">
            
            <?php if($enable_author) { ?>
            <li>
                <i class="fa fa-user"></i>
                <?php tradeup_posted_by(); ?>
            </li>
            <?php } ?>
            
            <?php if($enable_comment) { ?>
            <li>
                <i class="fa fa-comments"></i>
                <?php echo esc_html(get_comments_number());  ?>
            </li>
            <?php } ?>

            <?php if($enable_visit) { ?>
            <li>
                <i class="fa fa-eye"></i>
                <?php if(tradeup_get_post_view()!=0){ 
                     echo esc_html(tradeup_get_post_view()); 
                 } else {
                    echo esc_html('0');
                 }?>
            </li>
            <?php } ?>

        </ul>
        <?php } ?>
        <div class="post-content p-4 text-center">
            <h5>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
                       
            <?php the_excerpt(); ?>
       		<a class="text-uppercase read-more" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('tradeup_readmore_general_section', 'Read More')); ?></a>
        </div>
    </article>
