<?php
/*
    Template Name: Home - Blog
*/
get_header();?>
<div class="content">
	<div class="container">
		<div class="row">			
			<div class="col-md-8">
				
								<?php 
									$query = new WP_QUERY ( array (
										'post_type'=>'post',
										'pagination'=>true,
										'posts_per_page'=>get_option( 'posts_per_page' ),
										'paged'=> get_query_var( 'page' ),
										'status' => 'published',
										));

									if ($query->have_posts()) : 
										while ($query->have_posts()) : $query->the_post()?>
										<div class="blog-entry">
					                        <?php tt_video_or_image_featured(); ?>

					                        <div class="row">
					                            <div class="col-md-4">
					                                <div class="entry-header">
					                                <h1><a href="<?php the_permalink( ) ?>"><?php the_title(); ?></a></h1>
					                                
					                                <p><span><?php the_time('F d , Y'); ?></span>

														<?php _e('by','icook') ?> <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a> <?php _e(' - in','icook') ?><a href="#">
															<?php the_category(', ') ?>

														</a></p>

					                                </div>
					                            </div>
					                            <div class="col-md-8">
					                                <div class="entry-content">
					                                    <?php the_excerpt(); ?>
					                                </div>
					                            </div>
					                        </div>
                						</div>
								<?php endwhile;
							endif; ?>
						</div>				

					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				</div>

				<!-- START PAGINATION -->
				    <?php
				    	$big = 999999999; // need an unlikely integer
				    	$total_pages = $query->max_num_pages;
				    	if ( $total_pages > 1 ) {
				    		$current_page = max( 1, get_query_var( 'page' ) );
				    		$args = array(
				    			'base' 		   => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				    			'format' 	   => '/page/%#%',
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
<?php wp_reset_postdata();?>
<?php get_footer() ?>