<?php
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

<div class="sp-100 bg-w">
    <div class="container">
        <div class="row <?php echo esc_attr($sidebar_layout); ?>">
            <?php 
        	if(is_active_sidebar( "woocommerce-widgets" )){ ?>
        		<div class="col-lg-8 col-md-8 col-sm-12">
        	<?php
        	} else { ?> 
        		<div class="col-lg-12 col-md-12 col-sm-12">
        	<?php }
        	   woocommerce_content();
        	?>

        	</div>
           
			<?php if(is_active_sidebar( "woocommerce-widgets" ) && ($sidebar_layout == 'has-left-sidebar') || ($sidebar_layout == 'has-right-sidebar')) { ?>
	            <div class="col-lg-4 col-md-4 col-sm-12">
	            <?php
	            	dynamic_sidebar('woocommerce-widgets') 
	            ?>
	        	</div>
	        <?php } ?>
	
		</div>
	</div>
</div>

<?php 
get_footer();
?>