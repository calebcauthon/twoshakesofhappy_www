<?php 
    
/***********************************************************************************************/
/* Shortcodes */
/***********************************************************************************************/

/* Shorcode row (Template structure)
============================================*/
add_shortcode('recipe', 'recipe');

function recipe($atts, $content = null) {
    extract(shortcode_atts(array(
        'addclass' => 'recipe'
    ), $atts));
    
    return '<div class=" '.$addclass.'">'. do_shortcode($content) .'</div>';
}