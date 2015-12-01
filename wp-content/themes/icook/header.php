<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <!-- meta charset="utf-8" / -->
    <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <!-- title>iCOOK</title -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- ======================================================================
                                    Mobile Specific Meta
        ======================================================================= -->
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
     <!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- ======================================================================
                                    Style CSS + Google Fonts
        ======================================================================= -->
    <?php echo "<script type='text/javascript'>var TemplateDir='".TT_THEME_URI."'</script>" ?>
	<!-- Favicon -->
	<?php if(_go('favicon')): ?>
		<link rel="shortcut icon" href="<?php _eo('favicon') ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>

	<!-- ===============================================
    START HEADER =================================== -->

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="logo">
                        <a href="<?php echo home_url() ?>" class="logo" style="<?php _estyle_changer('logo_text') ?>" >
                            <?php if(_go('logo_text')): ?>
                                <?php _eo('logo_text') ?>
                            <?php elseif(_go('logo_image')): ?>
                                <img src="<?php _eo('logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME ?> logo">
                            <?php else: ?>
                                <?php echo THEME_PRETTY_NAME; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-xs-6">
                    <div class="menu">
                        <div class="responsive-menu"><?php _e('Menu','icook') ?></div>
                        <ul>
                            <?php wp_nav_menu( array( 
                                'title_li'=>'',
                                'theme_location' => 'main_menu',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'fallback_cb' => 'wp_list_pages',
                                'depth' => 0
                            )); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php 
                if ( is_404() ): ?>
                <div class="header-heading">
                    <h2>Your recipe is at a click away. Choose your favorite recipe and cooking with iCOOK. Enjoy all the flavors with iCOOK.</h2>
                </div>
                <?php else:
                    tesla_page_heading($post->ID);
                endif;
            ?>
        </div>
    </div>
    <!-- ===============================================
    END HEADER =================================== -->