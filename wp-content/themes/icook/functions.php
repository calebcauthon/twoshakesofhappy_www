<?php
/***********************************************************************************************/
/*  Tesla Framework */
/***********************************************************************************************/
require_once(get_template_directory() . '/tesla_framework/tesla.php');

/***********************************************************************************************/
/* Load JS and CSS Files - done with TT_ENQUEUE */
/***********************************************************************************************/

/***********************************************************************************************/
/* Google fonts + Fonts changer */
/***********************************************************************************************/

TT_ENQUEUE::$base_gfonts = array('://fonts.googleapis.com/css?family=Oswald:400,700,300|Bitter:400,700,400italic');
TT_ENQUEUE::$gfont_changer = array(
        _go('logo_text_font')
    );
TT_ENQUEUE::add_js(array('http://w.sharethis.com/button/buttons.js'));

/***********************************************************************************************/
/* Custom CSS */
/***********************************************************************************************/
add_action('wp_enqueue_scripts', 'tesla_custom_css', 99);
function tesla_custom_css() {
    $custom_css = _go('custom_css') ? _go('custom_css') : '';
    wp_add_inline_style('tt-main-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'tt_color_changers',99);
function tt_color_changers(){
    $background_color = _go('bg_color') ;
    $background_image = _go('bg_image') ;
    wp_add_inline_style('tt-main-style', "body{background-color: $background_color;background-image: url('$background_image')}");

    $colopickers_css = '';
    if (_go('site_color')) : 

    $colopickers_css .= 'a,
        .content ol li a,
        .content ul li a,
        .header .menu li a,
        .content .blog-entry .entry-header p a,
        .content .blog-entry .entry-header h1 a,
        .content .widget .popular-entrys .popular-entry h3 a,
        .content .post_pagination ul.page-numbers li,
        .content ul.page-numbers li span,
        .content ul.page-numbers li a,
        .content .entry-footer p a:hover,
        .content .recipe-pagination .last-recipe,
        .content .recipe-pagination .next-recipe,
        .filter-area .recipe-item h1 a:hover,
        .footer ul li a {
            color:' . _go('site_color') . ';
        }

        .post-password-form input,
        .comment-form .form-submit #submit,
        #contact_form .contact-button,
        .comments-area .comment-respond .comments-button,
        .filter-area .filter li a.active,
        .filter-area .filter li a:hover {
            background-color: ' . _go('site_color') . ';
        }

        .content .socials li a:hover {
            border-color: ' . _go('site_color') . ';
        }';
    endif;
    wp_add_inline_style('tt-main-style', $colopickers_css);
}

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function tt_register_menus(){
    register_nav_menus(
        array(
            'main_menu'    => _x('Main menu', 'dashboard','icook'),
        )
    );
}
add_action('init', 'tt_register_menus');

/***********************************************************************************************/
/* Add Shortcodes */
/***********************************************************************************************/

require_once(TT_THEME_DIR . '/shortcodes.php');


/***********************************************************************************************/
/* Add Widgets */
/***********************************************************************************************/

require_once(TT_THEME_DIR . '/widgets/widget-social.php');
require_once(TT_THEME_DIR . '/widgets/popular-posts.php');

/* ========================================================================================================================

  Comments

  ======================================================================================================================== */
 
function tt_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="tt-comment comment">
        <?php endif; ?>
        
        <!-- span class="tt-avatar">
            <?php //if ($args['avatar_size'] != 0)
                //echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </span -->

        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">
                <?php _e('Your comment is awaiting moderation.','icook') ?>
            </em>
            <br />
        <?php endif; ?>
        
        <?php comment_text() ?>

        <span class="comment-meta commentmetadata comment-info">
            <?php echo 'by '.get_comment_author_link() ?>
            <?php edit_comment_link(__('(Edit)','icook'),'  ','' );?>
            <span><?php echo get_comment_time('F n, Y').' at '.get_comment_time('h : i') ?></span>
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </span>

        
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; 

}


/*==== Function Call custom meta boxex ====*/
function tt_video_or_image_featured($echo = false) {
    global $post;
    $embed_code = get_post_meta($post->ID , THEME_NAME . '_video_embed', true);
    $patern = '<div class="entry-cover">%s</div>';

    if($echo){

        if(!empty($embed_code)) {
            return sprintf($patern, $embed_code);
        }else {
            if( has_post_thumbnail() && ! post_password_required() ){
                return sprintf($patern, get_the_post_thumbnail());
            }
        }

    }else{

        if(!empty($embed_code)) {
            printf($patern, $embed_code);
        }else {
            if( has_post_thumbnail() && ! post_password_required() ){
                printf($patern, get_the_post_thumbnail());
            }
        }

    }
}

function tt_custom_comments_closed( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    
    if($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback'):?>
        <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
            <?php if ( 'div' != $args['style'] ) : ?>
                <div id="div-comment-<?php comment_ID() ?>" class="tt-comment comment">
            <?php endif; ?>

            <!--span class="tt-avatar">
                <?php // if ($args['avatar_size'] != 0)
                    // echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </span -->

            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation">
                    <?php _e('Your comment is awaiting moderation.','icook') ?>
                </em>
                <br />
            <?php endif; ?>

            <?php comment_text() ?>

            <span class="comment-meta commentmetadata comment-info">
                
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                <?php echo get_comment_author_link() ?>
                <?php edit_comment_link(__('(Edit)','icook'),'  ','' );?>
                <span><?php echo get_comment_time('F n, Y').' at '.get_comment_time('h : i') ?></span>

            </span>
            
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>
    <?php endif; 

}

/***********************************************************************************************/
/* Add Sidebar Support */
/***********************************************************************************************/
function tt_register_sidebars(){
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name'           => __('Blog Sidebar', 'icook'),
                'id'             => 'blog',
                'description'    => __('Blog Sidebar Area', 'icook'),
                'before_widget'  => '<div class="widget %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h3>',
                'after_title'    => '</h3>'
            )
        );
    }
}
add_action('widgets_init','tt_register_sidebars');

function tt_share(){
    $share_this = _go('share_this');
    if(!empty($share_this)): ?>
        <div class="share-it">
            <?php //_ex('Share','single-post','icook'); ?>
            <ul class="socials">
                <?php foreach($share_this as $val): ?>
                    <li>
                        <a href="#"><span class='st_<?php echo $val ?>_large' displayText='<?php echo ucfirst($val) ?>'></span></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="clear"></div>
        </div>
    <?php endif;
}

function tesla_page_heading ($id) {
    if ( get_post_meta($id,THEME_NAME . '_page_title',true) ):
        $welcome_headline = get_post_meta($id,THEME_NAME . '_page_title',true);  ?>
        <div class="header-heading">
            <h2><?php echo $welcome_headline ?></h2>
        </div>
    <?php  endif; 
}

function tt_ajax_contact_form () {
    $receiver_mail = (_go('email_contact')) ? _go('email_contact') : get_bloginfo( 'admin_email' );

    $header = array();
    if (!empty($_POST['name']) && !empty($_POST ['email']) && !empty($_POST ['message'])) {
        $mail_title = (!empty($_POST['website'])) ? $_POST['name'] . ' from ' . $_POST['website'] : ' from ' . get_bloginfo( 'name' ) . ' Contact form';
        $email = $_POST['email'];
        $message = $_POST['message'];
        $message = wordwrap($message, 70, "\r\n");
        $header[] = 'From: ' . $_POST['name'] . "\r\n";
        $header[] = 'Reply-To: ' . $email;
    
        if ( wp_mail( $receiver_mail, $mail_title, $message, $header ) )
            $result = __('Message successfully sent.', 'icook');
        else
            $result = __('Message could not be sent.', 'icook');
    }else
        $result = __('Please fill all the fields','icook');
    die($result);
}
add_action('wp_ajax_tt_ajax_contact_form', 'tt_ajax_contact_form');           // for logged in user  
add_action('wp_ajax_nopriv_tt_ajax_contact_form', 'tt_ajax_contact_form');    // if user not logged in