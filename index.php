<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Newsup
 */
get_header(); ?>
<!--==================== Newsup breadcrumb section ====================-->
            <div id="content" class="container-fluid home">
                <!--row-->
                <div class="">
                    <!--col-md-8-->
                    <?php 
                    $newsup_content_layout = esc_attr(get_theme_mod('newsup_content_layout','align-content-right'));
                    if($newsup_content_layout == "align-content-left")
                    { ?>
                    <aside class="col-md-4 col-sm-4">
                        <?php get_sidebar();?>
                    </aside>
                    <?php } ?>
                    <?php if($newsup_content_layout == "align-content-right"){
                    ?>
                    <div class="col-md-8 col-sm-8">
                    <?php } elseif($newsup_content_layout == "align-content-left") { ?>
                    <div class="col-md-8 col-sm-8">
                    <?php } elseif($newsup_content_layout == "full-width-content") { ?>
                     <div class="col-md-12 col-sm-12">
                     <?php } get_template_part('content',''); ?>
                    </div>
                    <!--/col-md-8-->
                    <?php if($newsup_content_layout == "align-content-right") { ?>
                    <!--col-md-4-->
                    <aside class="col-md-4 col-sm-4">
                        <?php get_sidebar();?>
                    </aside>
                    <!--/col-md-4-->
                    <?php } ?>
                </div>
                <!--/row-->
		</div>
										</div>
  <div class="container-fluid mr-bot40 mg-posts-sec-inner">
        <div class="missed-inner">
        <div class="row">
            <?php $you_missed_title = get_theme_mod('you_missed_title', esc_html('You missed','newsup'));
            if($you_missed_title) { ?>
            <div class="col-md-12">
                <div class="mg-sec-title">
                    <!-- mg-sec-title -->
                    <h4>مقــالات</h4>
                </div>
            </div>
            <?php } 
            $newsup_you_missed_loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 6, 'order' => 'DESC', 'category_name' => 'business', 'ignore_sticky_posts' => true));
            if ( $newsup_you_missed_loop->have_posts() ) :
            while ( $newsup_you_missed_loop->have_posts() ) : $newsup_you_missed_loop->the_post(); ?>
                <!--col-md-3-->
                <div class="col-md-4 col-sm-6 pulse animated">
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
										</div>
<?php
get_footer();
?>