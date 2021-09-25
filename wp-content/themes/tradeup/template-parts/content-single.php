<?php
/**
 * Template part for displaying single posts content.
 *
 *
 * @subpackage tradeup
 * @since 1.0 
 */

?>

<?php 
$enable_author = get_theme_mod('tradeup_enable_author_single_section',true); 
$enable_comment = get_theme_mod('tradeup_enable_comment_single_section',true); 
$enable_date = get_theme_mod('tradeup_enable_date_single_section',true); 
$enable_tags = get_theme_mod('tradeup_enable_tags_single_section',true);
$enable_visit = get_theme_mod('tradeup_enable_vcount_single_section',true); 
$enable_image = get_theme_mod('tradeup_enable_fimage_single_section',true); 
?>

<div class="blog-detail">
    <?php if($enable_image) { ?>
        <?php
        if($enable_image && has_post_thumbnail()){
            the_post_thumbnail(); 
        } ?>
    <?php } ?>
    
    <ul class="post-meta text-left">

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

        <?php if($enable_date) { ?>
        <li>
            <i class="fa fa-calendar"></i>
            <?php tradeup_posted_on(); ?>
        </li>
        <?php } ?>

        <?php if($enable_visit) { ?>
        <li>
            <i class="fa fa-eye"></i>
            <?php if(tradeup_get_post_view()!=0){ 
                 echo esc_html(tradeup_get_post_view()); 
             } else {
                ?>0<?php
             }?>
        </li>
        <?php } ?>
    </ul>
        
    <h4 class="text-capitalize"><?php the_title(); ?></h4>
   
   <p><?php the_content(); ?></p>

    <?php if($enable_tags && has_tag()) { ?>
    <div class="post-tags mt-4">
        <span class="text-capitalize mr-2 c-black">
            <i class="fa fa-tags"></i> tags :</span>
            <?php the_tags('', ', ', '<br />'); ?>
    </div>
    <?php } ?>

    <?php 

    if (get_previous_post_link()) { 
        $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
    }
    if (get_next_post_link()) { 
         $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
    } ?>

     <div class="pagination-blog mt-4 mb-5">
        <a href="<?php echo esc_url($previous_post_url); ?>" class="blog-prev">
            <i class="fa fa-angle-left"></i> Previous Post
        </a>
        <a href="<?php echo esc_url($next_post_url); ?>" class="blog-next">Next Post 
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>