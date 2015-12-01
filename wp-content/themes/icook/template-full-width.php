<?php
/*
    Template Name: Full Width
*/

get_header(); ?>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="entry-header">
				<h2><?php the_title(); ?></h2>
			</div>
			<?php if (have_posts()) : 
			    while(have_posts()) : the_post();

			    	the_content();

			    endwhile; ?>
			<?php endif; ?>
			<?php comments_template( ); ?>
		</div>
	</div><!-- Container -->
</div>
<?php get_footer(); ?>