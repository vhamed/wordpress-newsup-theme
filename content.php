<?php
/**
 * The template for displaying the content.
 * @package Newsup
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <!-- mg-posts-sec mg-posts-modul-6 -->
            <section class="mg-fea-area">
            <div class="overlay">
                <div class="container-fluid">
                    <div class="">
                        <div class="col-md-12">
                            <div class="row">
                                <div id="homemain" class="homemain owl-carousel mr-bot60 pd-r-10"> 
                                <?php newsup_get_block('list', 'banner'); ?>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
                            <div class="mg-posts-sec mg-posts-modul-6">
                                <!-- mg-posts-sec-inner -->
                                <div class="mg-wid-section-title"><h6>الأخبـــــار</h6></div>
                                <div class="mg-posts-sec-inner">
                                    <?php while(have_posts()){ the_post(); ?>
                                    <article class="mg-posts-sec-post">
                                        <div class="standard_post">
                                            <?php if(has_post_thumbnail()) { ?>
                                            <div class="mg-thum-list col-md-6">

                                                <div class="mg-post-thumb">
<?php
echo '<a class="mg-blog-thumb" href="'.esc_url(get_the_permalink()).'">';
the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
echo '</a>';

?>
                                                </div>

                                            </div>
                                            <?php }  ?>
                                            <div class="list_content col">
                                                <div class="mg-sec-top-post">
                                                    <div class="mg-blog-category"> 
                                                        <?php newsup_post_categories(); ?>
                                                    </div>

                                                    <h1 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>

                                                    <div class="mg-blog-meta">
                                                        <span class="mg-blog-date"><i class="fa fa-clock-o"></i>
                                                        <a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>">
                                                        <?php echo esc_html(get_the_date('M j, Y')); ?></a></span>
                                                        <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user-circle-o"></i> <?php the_author(); ?></a> 
                                                    </div>
                                                </div>

                                                <div class="mg-posts-sec-post-content">
                                                    <div class="mg-content">
                                                        <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                     <?php } ?>
                                    <div class="col-md-12 text-center">
<?php //Previous / next page navigation
the_posts_pagination( array(
  'prev_text'          => '<i class="fa fa-angle-left"></i>',
  'next_text'          => '<i class="fa fa-angle-right"></i>',
) ); ?>
                                    </div>
                                </div>
                                <!-- // mg-posts-sec-inner -->
                            </div>
                            <!-- // mg-posts-sec block_6 -->

                            <!--col-md-12-->
</div>
