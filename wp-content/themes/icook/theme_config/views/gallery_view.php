<?php 
    global $template;
    $filename = basename($template);
    /*$slides_per_page = $shortcode['per_page'];
    if ($filename == 'page-portfolio.php')
        $slides_per_page = get_option(THEME_NAME . '_portfolio_per_page');
    if ($slides_per_page == 0)
        $slides_per_page = 18;*/

    if ($filename == 'template-gallery.php')
        $columns = (_go('gallery_columns')) ? _go('gallery_columns') : 4 ;
    else
        $columns = $shortcode['columns'];
?>

    <div class="filter-area">
        <div class="filter-box">
            <ul class="filter filter-all tesla_filters" data-tesla-plugin="filters">
                <li>
                    <a data-category="" class="active" href="#">all</a>
                </li>
                <?php foreach($all_categories as $category_slug => $category_name): ?>
                    <li>
                        <a href="#" data-category="<?php echo $category_slug; ?>"><?php echo $category_name; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h1><?php _e('Recipes', 'icook') ?></h1>
        </div>

        <div class="row" data-tesla-plugin="masonry">

                <?php 
                    // $slides_per_page = _go('gallery_slides') ? _go('gallery_slides') : count ( $slides ); 
                    // $j = 0;
                ?>

                <?php foreach ($slides as $slide_nr => $slide) : ?>
                   <?php 

                      $span = 12 / $columns; ?>
                       
                        <div class="col-md-<?php echo $span?> col-xs-6 <?php echo implode(' ', array_keys($slide['categories'])); ?>">
                            <div class="recipe-item">
                                <a href="<?php echo $slide['options']['full_image']; ?>" class="swipebox">
                                    <span class="item-cover recipe-item-cover">
                                        <img src="<?php echo $slide['options']['cover_image']; ?>" alt="portfolio-image" />
                                    </span>
                                </a>
                                <h1>
                                    <a href="<?php echo get_permalink( $slide['post']->ID ); ?>"><?php  echo get_the_title( $slide['post']->ID ); ?></a>
                                </h1>
                            </div>
                        </div>
                <?php 
                
                /*
                $j++;
                if ($j >= $slides_per_page ) {
                    break;
                }
                */
                endforeach; ?>
            </div>

                <?php 
                /*
                if ( count ( $slides ) > $slides_per_page) :
                    $total_pages  =  ceil (count ( $slides ) / $slides_per_page);
                     

                    $big = 999999999; // need an unlikely integer
                    $paginate_args = array(
                                'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format'       => '/page/%#%',
                                'total'        => $total_pages,
                                'current'      => 1,
                                'show_all'     => False,
                                'end_size'     => 1,
                                'mid_size'     => 2,
                                'prev_next'    => True,
                                'prev_text'    => __('Prev','icook'),
                                'next_text'    => __('Next','icook'),
                                'type'         => 'list',
                                'add_args'     => False,
                                'add_fragment' => ''
                            );
                ?>
                <!-- div class="gallery-pagination" id="gallery_pagination" -->
                   <?php echo paginate_links( $paginate_args ); ?>
                <!-- /div -->
                <?php endif; 
                */ ?>
            
        

    </div>
