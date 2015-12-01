<?php get_header(); ?>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">		
			<div class="entry-header site-title">
				<h3 class="site-title"><?php the_title(); ?></h3>
			</div>
			<?php if (have_posts()) : 
			    while(have_posts()) : the_post();

			    	the_content();

			    endwhile; ?>
			<?php endif; ?>
			<hr />
			<?php comments_template( ); ?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div><!-- Container -->
</div>
<?php get_footer(); ?>