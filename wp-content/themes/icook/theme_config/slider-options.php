<?php

return array(
	'gallery' => array(
		'name' => 'Gallery',
		'term' => 'Gallery',
		'term_plural' => 'Items in gallery',
		'order' => 'ASC',
		'has_single' => true,
		'post_options' => array('supports'=> array( 'title' , 'editor', 'comments'),'has_archive'=>true),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Gallery item cover',
				'title' => 'Cover',
				'default' => 'holder.js/240x240/auto'
			),
			'full_image' => array(
				'type' => 'image',
				'description' => 'Gallery item full size ( as big as you need - shown at zoominh in )',
				'title' => 'Full Size',
				'default' => 'holder.js/240x240/auto'
			),

		),
		'icon' => 'icons/icook.ico',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_gallery',
				'view' => 'views/gallery_view',
				'shortcode_defaults' => array(
					'columns' => 4,
				)
			),
			'single' => array(
				'view' => 'views/gallery_single_view',
				'shortcode_defaults' => array(
					
				)
			)
		)
	)
);