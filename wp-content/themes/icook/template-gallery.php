<?php
/*
    Template Name: Gallery
*/
get_header();?>
<div class="content">
	<div class="container">
		<?php echo Tesla_slider::get_slider_html('gallery');?>
	</div>
</div>

<?php if (have_posts()) : 
    while(have_posts()) : the_post(); ?>
    <div class='container'>
        <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer();