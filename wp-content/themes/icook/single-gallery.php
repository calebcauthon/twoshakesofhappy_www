<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

	<?php echo Tesla_slider::get_slider_html('gallery','','single',get_the_ID()); ?>

<?php endif; ?>

<?php get_footer(); ?>