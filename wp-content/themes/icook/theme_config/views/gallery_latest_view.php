<?php 
    $nr = $shortcode['nr'];
    $columns = $shortcode['columns'];
    
?>
    <div class="gallery">
        <div class="row" data-tesla-plugin="masonry">
            <?php foreach ($slides as $slide_nr => $slide) : 
                if( $slide_nr >= $nr )
                    break;
                $span = 12 / $columns;
                $span *= (int)$slide['options']['size']?>
                <div class="span<?php echo $span?> <?php echo implode(' ', array_keys($slide['categories'])); ?>">
                    <div class="item">
                        <div class="item-hover">
                            <a href="<?php echo $slide['options']['full_image']; ?>" class="swipebox"></a></div>
                        <div class="item-cover">
                            <img src="<?php echo $slide['options']['cover_image']; ?>" alt="portfolio-image" />
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>