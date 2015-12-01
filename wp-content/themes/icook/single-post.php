<?php
/**
 * Single post page
 */
get_header(); ?>


<!-- ===============================================
    START CONTENT =================================== -->

<div class="content">
    <div class="container">
    	<?php if (have_posts()) : 
		    while ( have_posts() ) : the_post();

			    tt_video_or_image_featured()?>

				<div class="row">
	                <div class="col-md-8">
	                	<div class="blog-entry">
							<?php get_template_part('content','single'); ?>
	                	</div>
	                </div>
	        		<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
	            </div>
	            <div class="recipe-pagination">
	                <div class="last-recipe"><?php next_post_link('%link &raquo;'); ?></div>
	                <div class="next-recipe"><?php  previous_post_link('&laquo; %link'); ?></div>
	            </div>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
</div>
<!-- Container -->



<?php get_footer(); ?>