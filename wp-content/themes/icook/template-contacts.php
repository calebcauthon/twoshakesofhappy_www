<?php
/*
	Template Name: Contact
*/
?>
<?php get_header(); ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page">
                            <h3 class="site-title"><?php _eo('title_map') ?></h3>
                            <div class="google-map">
                                <?php tt_gmap('contact_map','contact-map','contact-map','false'); ?>
                            </div>

                        <?php if(_go('contact_form')) : ?>
                            <div class="contact-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul>
                                            <li>
                                                <span class="location"><?php _eo('contact_address') ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li>
                                                <span class="location"><a href="<?php _eo('email_contact') ?>"><?php _eo('email_contact') ?></a></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li>
                                                <span class="phone"><?php _eo('contact_phone') ?></span>
                                            </li>
                                            <li>
                                                <span class="phone"><?php _eo('contact_fax') ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <h3 class="site-title"><?php _eo('title_contact') ?></h3>
                            <form class="contact-form" id="contact_form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name"><?php _e('Name', 'icook'); ?></label>
                                        <input type="text" name="name" id="name" class="the-line contact-line contact-line-1 " placeholder="<?php _ex('Enter your name','contact-form','icook')?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="email"><?php _e('E-mail', 'icook'); ?></label>
                                        <input type="text" name="email" id="email" class="the-line contact-line contact-line-2 " placeholder="<?php _ex('Enter your e-mail adress','contact-form','icook')?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="email"><?php _e('Website', 'icook'); ?></label>
                                        <input type="text" name="website" id="website" class="the-line contact-line contact-line-3" placeholder="<?php _ex('Enter website adress','contact-form','icook')?>">
                                    </div>

                                </div>
                                 <label for="message"><?php _e('Message','icook') ?></label>
                                <textarea name="message" id="message" class="the-area contact-area"></textarea>
                                <input type="submit" id="contact_send" class="contact-button" value="<?php _ex('Write the letter','contact-form','icook')?>" >
                            </form>
                       <?php endif; ?> 
                    </div>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
    </div>
<?php get_footer(); ?>