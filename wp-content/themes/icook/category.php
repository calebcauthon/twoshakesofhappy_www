<?php get_header(); ?>


    <div class="content">
        <div class="container">
            <div class="row">
                
                <div class="col-md-8">
                <h3 class="site-title"><?php _e('Category Archive: ','icook');echo single_cat_title('', false); ?></h3>
                <!-- BLOG ENTRY REPEAT -->
                    <?php if (have_posts()) : 
                        while ( have_posts() ) : the_post(); 
                            
                            // declaring vars
                            $post_id = $post->ID; 
                        ?>


                            <div class="blog-entry">
                                
                                    <?php tt_video_or_image_featured(); ?>
                                    
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="entry-header">

                                        <h1><a href="<?php echo get_permalink( $post_id ) ?>"><?php the_title(); ?></a></h1>
                                        
                                        <p><span><?php the_time('F d , Y'); ?></span>

                                            by <a href="#"><?php the_author(); ?></a>  - in<a href="#">
                                            <?php the_category(', ') ?>
                                            </a></p>

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="entry-content">
                                            <?php
                                                $excerpt = get_the_excerpt();
                                                if(!empty($excerpt)){
                                                    the_excerpt();
                                                }else{
                                                    the_content();
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                <!-- BLOG ENTRY REPEAT -->
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>

                </div>
            </div><!-- Container -->

            <!-- START PAGINATION -->
                <?php
                    $big = 999999999; // need an unlikely integer
                    global $wp_query;
                    $total_pages = $wp_query->max_num_pages;
                    if ( $total_pages > 1 ) {
                        $current_page = max( 1, get_query_var( 'paged' ) );
                        $args = array(
                            'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format'       => '/page/%#%',
                            'total'        => $total_pages,
                            'current'      => $current_page,
                            'show_all'     => False,
                            'end_size'     => 1,
                            'mid_size'     => 2,
                            'prev_next'    => True,
                            'prev_text'    => __('Prev',THEME_NAME),
                            'next_text'    => __('Next',THEME_NAME),
                            'type'         => 'list',
                            'add_args'     => False,
                            'add_fragment' => ''
                        );
                        echo paginate_links( $args );
                    }
                ?>
            <!-- END PAGINATION --> 
        </div>
    </div>


<?php get_footer(); ?>