<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Newsup
 */
$you_missed_enable = esc_attr(get_theme_mod('you_missed_enable','true'));
            if($you_missed_enable == true){
?>
  <div class="container-fluid mr-bot40 mg-posts-sec-inner">
        <div class="missed-inner">
        <div class="row">
            <?php $you_missed_title = get_theme_mod('you_missed_title', esc_html('You missed','newsup'));
            if($you_missed_title) { ?>
            <div class="col-md-12">
                <div class="mg-sec-title">
                    <!-- mg-sec-title -->
                    <h4><?php echo esc_html($you_missed_title); ?></h4>
                </div>
            </div>
            <?php } 
            $newsup_you_missed_loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC',  'ignore_sticky_posts' => true));
            if ( $newsup_you_missed_loop->have_posts() ) :
            while ( $newsup_you_missed_loop->have_posts() ) : $newsup_you_missed_loop->the_post(); ?>
                <!--col-md-3-->
                <div class="col-md-3 col-sm-6 pulse animated">
                <div class="mg-blog-post-3">
                    <?php if(has_post_thumbnail()) { ?>
                    <div class="mg-blog-img">
                        <?php 
                        echo '<a href="'.esc_url(get_the_permalink()).'">';
                            the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
                            echo '</a>'; ?>
                    </div>
                    <?php }  else { ?>
                    <div class="mg-blog-img image-blog-bg">
                    </div>
                   <?php } ?>
                    <div class="mg-blog-inner">
                      <div class="mg-blog-category">
                      <?php newsup_post_categories(); ?>
                      </div>
                      <h1 class="title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ','after'  => '') ); ?>"> <?php the_title(); ?></a> </h1>
                      <?php newsup_post_meta(); ?>
                    </div>
                </div>
            </div>
            <!--/col-md-3-->
         <?php endwhile; endif; wp_reset_postdata(); ?>
            

                </div>
            </div>
        </div>
<?php } ?>
    </div>
<!--==================== FOOTER AREA ====================-->
    <?php $newsup_footer_widget_background = get_theme_mod('newsup_footer_widget_background');
    $newsup_footer_overlay_color = get_theme_mod('newsup_footer_overlay_color'); 
   if($newsup_footer_widget_background != '') { ?>
    <footer style="background-image:url('<?php echo esc_url($newsup_footer_widget_background);?>');">
     <?php } else { ?>
    <footer> 
    <?php } ?>
        <div class="overlay" style="background-color: <?php echo esc_html($newsup_footer_overlay_color);?>;">
                <!--Start mg-footer-widget-area-->
                 <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
                <div class="mg-footer-widget-area">
                    <div class="container-fluid">
                        <div class="row">
                          <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/container-->
                </div>
                 <?php } ?>
                <!--End mg-footer-widget-area-->
                <!--Start mg-footer-widget-area-->
                <!--End mg-footer-widget-area-->
            </div>
            <!--/overlay-->
        </footer>
        <!--/footer-->
    </div>
    <!--/wrapper-->
    <!--Scroll To Top-->
    <a href="#" class="ta_upscr bounceInup animated"><i class="fa fa-angle-up"></i></a>
    <!--/Scroll To Top-->
<!-- /Scroll To Top -->
<?php wp_footer(); ?>
</body>
</html>