<?php $slide = $slides[0]; ?>

<!-- ===============================================
    START CONTENT =================================== -->

<div class="content">
    <div class="container">
                <div class="entry-cover">
                    <img src="<?php echo $slide['options']['full_image'] ?>" alt=" <?php _e('gallery photo', 'icook'); ?> ">
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-entry">
                            <div class="entry-header">
                                <h1><?php the_title() ?></h1>
                                <p><span><?php the_time('F n, Y') ?></span> <?php _ex('by','blog','icook'); ?>: <?php the_author( ); ?> <a href="<?php the_permalink(); ?>"></a>  
                                
                                <?php echo implode(' ,', $slide['categories']); ?>

                            </div>
                            <div class="entry-content">
                                <?php the_content() ?>

                                <div class="entry-footer">
                                    <?php tt_share(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Comments area -->
                        <div class="comments">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
                <div class="recipe-pagination">
                    <div class="last-recipe"><a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><?php the_title() ?></a> &raquo;</div>
                    <div class="next-recipe">&laquo; <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"><?php the_title() ?></a></div>
                </div>
    </div>
</div>