<div id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>
    <div class="entry-header">
        <h1><?php the_title() ?></h1>
        <p><span><?php the_time('F d , Y'); ?></span> <?php _ex('by','blog','icook'); ?>: <?php the_author_link(); ?> <a href="<?php the_permalink(); ?>"></a>  
        
        <?php the_category(', ')?>

    </div>
    <div class="entry-content">
        <?php the_content(); ?>
    
        <div class="entry-footer">
            <p><?php the_tags( 'tags : ', ',', '' ); ?></p>
            
            <?php tt_share(); ?>

            <div class="post_pagination">
                <?php wp_link_pages(array(
                    'before'           => '<ul class="page-numbers center">',
                    'after'            => '</ul>',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'number',
                    'separator'        => '</li><li>',
                    'nextpagelink'     => __( 'Next page','icook' ),
                    'previouspagelink' => __( 'Previous page','icook' ),
                    'pagelink'         => '%',
                    'echo'             => 1
                )); ?>
            </div>
        </div>
    </div>
</div>

<!-- Comments area -->
<div class="comments">
    <?php comments_template(); ?>
</div>