        </div>
        <!-- ================================= END CONTENT === -->
        
        <!-- ================================= START FOOTER === -->
        <div class="footer">
            <?php if(_go('show_subscription')) : ?>
                <div class="subscription">
                    <div class="container">
                        <div class="row">
                            <div class="span6">
                                <h2 id="result_container"><?php _eo('subscription_title') ?></h2>
                            </div>
                            <div class="span6">
                                <form class="subscription-form" id="newsletter" method="post" data-tt-subscription>
                                    <input type="submit" value="<?php _eo('subscription_button')?>" class="subscription-button">
                                    <input type="text" name="email" placeholder="<?php _eo('subscription_placeholder') ?>" class="subscription-line" data-tt-subscription-required data-tt-subscription-type="email">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="footer-copyright">
                <div class="container">
                    <p><?php _eo('copyright_message') ?> Designed by <a href="http://www.teslathemes.com" target="_blank">TeslaThemes</a></p>
                    <ul>
                        <?php wp_nav_menu( array( 
                                'title_li'=>'',
                                'theme_location' => 'main_menu',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'fallback_cb' => 'wp_list_pages',
                                'depth' => '1'
                            )); ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ================================= END FOOTER === -->      
        <?php _eo('tracking_code'); ?>
        <?php wp_footer(); ?>
    </body>
</html>