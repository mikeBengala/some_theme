<?php
get_header();
$menu_background_colors = (object) array(
    "before_scroll" => "black",
    "after_scroll" => "white",
    "transparent_while_on_top" => true
);
set_query_var( 'background_colors', $menu_background_colors );
get_template_part( 'parts/header_menu', 'background_colors' );
the_post();
$post_id = get_the_ID();

//header pictures settings ------------------------------------>
if(has_post_thumbnail()){
    $background_image = get_the_post_thumbnail_url($post_id, 'full');
}else if(get_theme_mod('header_image')){
    $background_image = get_theme_mod('header_image');
}else{
    $background_image = get_template_directory_uri() . "/static/img/header.jpg";
}
//end header pictures settings -------------------------------->
?>
<section id="main" data-page="page">

    <div class="title_header grid-100 parallax" data-image-src="<?=esc_url($background_image)?>">
        <h1><?php the_title(); ?></h1>
        <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs("white"); ?>
        <?php edit_post_link( __( 'Edit Page', 'quiet_theme' ), '<div class="more-button-wrap"><div class="white_edit_post edit_link_wrap no_margin margin_on_top">', '</div></div>' ) ?>
    </div>
    <div id="content" class="page_content_container">
        <div class="max_900">
            <div class="page_post_wrap">
                <div id="post-<?=esc_html($post_id)?>" <?php post_class('post'); ?>>

                        <?php the_content(); ?>
                        <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>

                </div>
            </div>
        </div>
    </div>

    <?php if ( comments_open() || get_comments_number() ) {?>
        <div class="comment_section efct margin-fade-in">
            <div class="max_900">
                <div class="grid-100">
                    <div class="comment_section_inner_wrap">
                        <?php comments_template();?>
                    </div>
                </div>
            </div>
        </div>
        <div class="open_comments_button_wrap grid-100 grid-parent efct fade-in">
            <div class="max_900">
                <button class="open_comments_button">
                    <span><?php _e("Leave a Reply to: ", "quiet_theme") . the_title()?></span><i class="fa fa-comment-o" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    <?php }?>

</section>

<?php get_footer(); ?>
