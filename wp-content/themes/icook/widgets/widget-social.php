<?php
class Tesla_social_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'tesla_social_widget',
                '['.THEME_PRETTY_NAME.'] Social',
                    array(
            			'description' => __('Social', 'icook'),
               		 	'classname' => 'tesla_social_widget',
                    )
        );
    }

    function widget($args, $instance) {
        extract($args);
        
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        echo $before_widget;

        if (!empty($title))
            echo $before_title. $title . $after_title;


 		$social_platforms = array(
					    'facebook',
					    'twitter',
					    'pinterest',
					    'flickr',
					    'dribbble',
					    'behance',
					    'google',
					    'linkedin',
					    'youtube',
					    'rss');
		$prefix='mini_';
   		$suffix='';
   		?>
		<ul class="socials">   		
		<?php 
		foreach($social_platforms as $platform):
	        if (_go('social_platforms_' . $platform)): ?>
	            <li><a href="<?php echo _go('social_platforms_' . $platform) ?>"><img src="<?php echo TT_THEME_URI ?>/images/socials/<?php echo $prefix.$platform.$suffix ?>.png" alt="<?php echo $platform ?>" /></a></li>
    		<?php endif;
    	endforeach;
		?>
		</ul>

		<?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        ?>
        <p>
            <label><?php _ex('Title:','dashboard','icook'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label> 
        </p>

        <?php
           $social_platforms = array(
							    'facebook',
							    'twitter',
							    'pinterest',
							    'flickr',
							    'dribbble',
							    'behance',
							    'google',
							    'linkedin',
							    'youtube',
							    'rss');
           	$prefix='mini_';
           	$suffix='';
    		?>
			<h3>Social</h3>
	    	<?php
			    foreach($social_platforms as $platform):
			        if (_go('social_platforms_' . $platform)): ?>
			            <a href="<?php echo _go('social_platforms_' . $platform) ?>"><img src="<?php echo TT_THEME_URI ?>/images/socials/<?php echo $prefix.$platform.$suffix ?>.png" alt="<?php echo $platform ?>" /></a>
		    		<?php endif;
		    	endforeach; ?>
			<?php 
    }
}

add_action('widgets_init', create_function('', 'return register_widget("Tesla_social_widget");'));