<!DOCTYPE html>
<head>
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . esc_html($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'quiet_theme' ), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'quiet_theme' ), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,500,700" rel="stylesheet">
    <?php wp_head(); ?>
    <?php get_template_part("parts/header_style");?>
</head>
<body <?=body_class()?>>
<div id="intro_wrap">
    <div id="intro">
        <div class="inner_intro">
            <p class="intro_title">
                <?= bloginfo('name')?>
            </p>
        </div>

    </div>
</div>
<div id="wrapper" class="hfeed">
