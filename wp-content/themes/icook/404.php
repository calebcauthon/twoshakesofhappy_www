<?php get_header(); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="error-404">
                <h3 class="center"><?php if ( _go('error_title') ) 
            								_eo('error_title'); 
            							else 
            								_e('Error 404','icook') ?></h3>
                <h6 class="center"><?php if (_go('error_message')) 
                    _eo('error_message'); 
                		else echo '<span>' . __('oops! ','icook') . "</span>" . __('page not found','icook') ?></h6>
                
                    <form class="sidebar-search  search" method="get" role="search" action="<?php echo home_url('/') ?>">
                        <input type="submit" value="" class="serach_button">
                        <input type="text" name="s" placeholder="<?php _ex('Search ...','Error 404','icook') ?>" class="search_line search-line">
                    </form>
                
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>