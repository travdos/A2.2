<?php
/* ------------------------------------------------------------------------- *
 *  Default portfolio template for index view (portfolio)
/* ------------------------------------------------------------------------- */
$pid = intval( get_the_ID() );
?>
<div class="grid-col col-lg-4 col-md-6 col-sm-12 sec-portfolio-item">
    <figure class="sec-portfolio-item-thumbnail">
        <?php if( has_post_thumbnail( $pid ) ) {
            echo get_the_post_thumbnail( $pid, apply_filters( 'tradeup_portfolio_thumbnail_size', 'tradeup-tmb-portfolio' ) ); } ?>
        <figcaption>
            <p class="description">
                <span class="title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>
                <span class="type"><?php tradeup_terms( $pid, 'jetpack-portfolio-type' ); ?></span>
            </p>
        </figcaption>
    </figure>
</div>
