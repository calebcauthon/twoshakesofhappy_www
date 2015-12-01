<?php
 // POPULAR POST WIDGET
 class show_popular extends WP_Widget {
 
    function __construct() {
        parent::__construct(
                'show_popular',
                '['.THEME_PRETTY_NAME.'] Popular Posts',
                array(
                    'description' => __('Show your popular posts.', 'icook'),
                    'classname' => 'show_popular',
                )
        );
    }

 
	function widget($args, $instance){
 		extract($args);
		//$options = get_option('custom_recent');
		$title = $instance['title'];
		$postscount = $instance['posts'];
 
		//GET the posts

 		//global $postcount;

 	echo $before_widget . $before_title . $title . $after_title;
	$query = new WP_QUERY(array( 'orderby' => 'comment_count', 'posts_per_page' => 5 ,'ignore_sticky_posts'=>true)); ?>
	
	<div class="popular-entrys">

		<?php if ( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post() ?>
			
			<div class="popular-entry">
			<?php
 				if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it.
			  			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'original' );
						$url = $thumb['0']; ?>
						<a href="<?php the_permalink() ?>"><img src="<?php echo $url ?>" alt="" style="width:100%" /></a>		
				 <?php endif; ?>
			
			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
			</div>	
			<!-- a href="<?php the_permalink() ?>"><?php //echo substr(strip_tags(get_the_content()), 0, 80);  ?>...</a></p -->

		<?php endwhile;
		endif; ?>
	</div>
	<?php echo $after_widget;
 	wp_reset_query();
	}
 
	function update($newInstance, $oldInstance){
		$instance = $oldInstance;
		$instance['title'] = strip_tags($newInstance['title']);
		$instance['posts'] = $newInstance['posts'];
		return $instance;
	}
 
	function form($instance){
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('title').'">' . __('Title:') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
		echo '<p style="text-align:right;"><label  for="'.$this->get_field_id('posts').'">' . __('Number of Posts:',  'widgets') . ' <input style="width: 50px;"  id="'.$this->get_field_id('posts').'"  name="'.$this->get_field_name('posts').'" type="text"  value="'.$instance['posts'].'" /></label></p>';
		echo '<input type="hidden" id="custom_recent" name="custom_recent" value="1" />';
	}
}
 
add_action('widgets_init', create_function('', 'return register_widget("show_popular");'));
 ?>