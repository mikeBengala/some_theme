<?php
get_header();
$menu_background_colors = (object) array(
    "before_scroll" => "black",
    "after_scroll" => "white",
    "transparent_while_on_top" => true
);
set_query_var( 'background_colors', $menu_background_colors );
get_template_part( 'parts/header_menu', 'background_colors' );
?>
<?php
    $header_image = get_template_directory_uri() . "/static/img/404.jpg";
?>
<div id="main">
    <div class="title_header grid-100 parallax" data-image-src="<?=esc_url($header_image)?>">
        <h1><?php _e( 'Error 404 - Page Not Found', 'quiet_theme' ); ?></h1>
        <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs("white"); ?>
    </div>
    <div id="content">
        <div class="max_900">
			<div class="page_content_container">
				<div class="regular_padding">
            		<p><?php _e( 'Whoah! You are trying to access some crazy crap right now.  You know, that kind that <em>does not exist</em>.  So stop, take a deep breath, and think a little.  Maybe you can find what you want by searching.  Maybe you made a typo.  As a humble 404 Not Found page, there is only so much I can know.  But I wish you the best of luck at finding the thing you are looking for, whomever you are.', 'quiet_theme' ); ?></p>
				</div>
			</div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
