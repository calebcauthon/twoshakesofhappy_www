<div id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>
    
    <?php tt_video_or_image_featured()?>
    <div class="col-md-5">
        <div class="entry-header">
            <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

            <p><span><?php the_time('F d , Y'); ?></span>

                by <a href="#"><?php the_author(); ?></a>  
                    <?php
                        $categories = get_the_category();
                    
                    if ( $categories ): ?>
                        
                        - in <a href="#">

                        <?php
                        $cats = '';
                        $separator = ', ';
                    
                        foreach ( $categories as $category) {
                            $cat_id = $category->term_id;
                            $cats .= '<a href="'.get_category_link($cat_id).'" id="cat_'.$cat_id.'">'.$category->cat_name.'</a>'.$separator;
                        }
                        echo trim($cats, $separator);
                        
                        endif; ?>

                </a></p>
        </div>
    </div>

    <div class="col-md-7">
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