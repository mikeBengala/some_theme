<?php
get_header();
$menu_background_colors = (object) array(
    "before_scroll" => "black",
    "after_scroll" => "white",
    "transparent_while_on_top" => true
);
set_query_var( 'background_colors', $menu_background_colors );
get_template_part( 'parts/header_menu', 'background_colors' );
$current_user = wp_get_current_user();
?>


<section id="main" data-page="homepage">

    <?php //Slider -------------------------------------->?>
    <?php $slides = get_posts(array('post_type' => 'slides'));?>
    <?php if( $slides ){?>
        <div class="owl-carousel owl-theme owl-homepage-slider">

            <?php foreach($slides as $slide){?>
                <div class="item">
                    <img src="<?=get_the_post_thumbnail_url($slide->ID, "full")?>">

                    <div class="carousel_caption">
                        <p class="carousel_title"><?=esc_html($slide->post_title)?></p>
                        <div class="carousel_description"><p><?=esc_html($slide->post_content)?></p></div>

                        <?php //if has more button ------------------------------------->?>
                        <?php $post_custom = get_post_custom($slide->ID);?>
                        <?php if (array_key_exists("_mcf_short-text", $post_custom)){?>

                            <?php
                                if (array_key_exists("_mcf_more-botton-target", $post_custom)){
                                    $more_button_target = "_blank";
                                }else{
                                    $more_button_target = "_self";
                                }
                            ?>
                        <?php }?>
                        <div class="more-button-wrap">
                            <?php if (array_key_exists("_mcf_short-text", $post_custom)){?>
                                <a target="<?=esc_html($more_button_target)?>" class="more-button" href="<?=esc_url($post_custom["_mcf_short-text"][0])?>" ><?php _e("More", "quiet_theme")?></a>
                            <?php }?>
                            <?php edit_post_link("edit slide", '<div class="white_edit_post edit_link_wrap">', '</div>', $slide->ID); ?>
                        </div>
                        <?php //end if has more button ------------------------------------->?>
                    </div>
                </div>
            <?php }?>

        </div>
    <?php }else{?>
        <div class="homepage_slider_alternative parallax" data-image-src="<?=get_template_directory_uri()?>/static/img/header.jpg">
            <?php if ( ! current_user_can('administrator') ) {?>

            <?php }else{?>
                <div class="more-button-wrap">
                    <div class="edit_link_wrap no_margin white_edit_post">
                        <a class="post-edit-link" href="<?=site_url()?>/wp-admin/options-general.php?page=one-click-setup-quiet-theme" ><?php _e("Import demo Content", "quiet_theme")?></a>
                    </div>
                </div>
            <?php }?>
        </div>
    <?php }?>
    <?php //end Slider ---------------------------------->?>

    <?php // highlight post section --------------------->?>
    <?php $highlights = get_posts(array('post_type' => 'highlight'));?>
    <?php $count = 0;?>
    <?php if( $highlights ){?>
        <div class="home_highlight_posts_wrap grid-100 grid-parent">
            <?php foreach($highlights as $highlight){?>
            <?php $count++;?>

            <div class="home_highligh_post grid-100 grid-parent home_highligh_post_<?=$count?>">
                <div class="max_1200 attr_childrens_tallest_height">


                    <div class="grid-50">
                        <div class="home_highligh_post_caption efct fade-in">
                            <?php //var_dump($highlight);?>
                            <h3><?=esc_html($highlight->post_title);?></h3>
                            <div class="home_highligh_post_content">
                                <?=apply_filters( 'the_content', $highlight->post_content );?>
                            </div>

                            <?php //more button and edit link ------------------------------------->?>
                            <?php $post_custom = get_post_custom($highlight->ID);?>
                            <?php if (array_key_exists("_mcf_short-text", $post_custom)){?>
                                <?php
                                    if (array_key_exists("_mcf_more-botton-target", $post_custom)){
                                        $more_button_target = "_blank";
                                    }else{
                                        $more_button_target = "_self";
                                    }
                                ?>
                            <?php }?>
                            <div class="more-button-wrap align_left grid-100 grid-parent">
                                    <?php if (array_key_exists("_mcf_short-text", $post_custom)){?>
                                        <a target="<?=esc_html($more_button_target)?>" class="more-button" href="<?=esc_url($post_custom["_mcf_short-text"][0])?>" ><?php _e("More", "quiet_theme")?></a>
                                    <?php }?>
                                    <?php edit_post_link("edit highlight", '<div class="black_edit_post edit_link_wrap">', '</div>', $highlight->ID); ?>
                                </div>
                            <?php //end more button and edit link ---------------------------------->?>


                        </div>
                    </div>


                    <div class="grid-50 mobile-force-padding-out">
                        <img class="efct fade-in delay_0_5s" src="<?=get_the_post_thumbnail_url($highlight->ID, "full");?>" alt="">
                    </div>


                </div>
            </div>


        <?php }?>
        </div>
    <?php }?>
    <?php // end highlight post-------------------------->?>

    <?php // Latest projects ---------------------------->?>
    <?php $projects = get_posts(array('post_type' => 'projects', 'posts_per_page' => 4));?>
    <?php $projects_number = sizeof($projects);?>
    <?php if( $projects ){?>
        <div class="grid-100 grid-parent homepage-projects">


            <?php foreach($projects as $project){?>
                <div class="grid-<?=($projects_number > 1) ? "50": "100";?> grid-parent homepage-project efct fade-in">
                    <?php if(has_post_thumbnail($project->ID)){?>
                        <div class="homepage_project_picture_wrap">
                            <img class="homepage_project_picture" src="<?=get_the_post_thumbnail_url($project->ID, "full")?>" alt="<?=esc_html($project->post_title)?>">
                        </div>
                    <?php }?>
                    <div class="homepage_project_caption">
                        <p class="homepage_project_title"><?=esc_html($project->post_title)?></p>
                        <div class="homepage_excerpt">

                            <?php if(has_excerpt($project->ID)){?>
                                <?php the_excerpt($project->ID);?>
                            <?php }else if($project->post_content != ""){ ?>
                                <?php $excerpt = substr_by_number_of_words($project->post_content);?>
                                <?=apply_filters( 'the_content', $excerpt );?>
                            <?php }?>

                        </div>
                        <div class="more-button-wrap">
                            <a class="more-button" href="<?=get_permalink($project->ID)?>" ><?php _e("View Project", "quiet_theme")?></a>
                            <?php edit_post_link("edit project", '<div class="edit_link_wrap white_edit_post">', '</div>', $project->ID); ?>
                        </div>

                    </div>
                </div>
            <?php }?>


        </div>
    <?php }?>
    <?php // end latest projects ------------------------>?>

    <?php // Homepage Icons ----------------------------->?>
    <?php $number_of_icons = get_theme_mod('homepage_icon_total', 4);?>
    <?php
        $demo_icons = array(
            1 => array(
                "icon" => "fa-picture-o",
                "text" => "Project"
            ),
            2 => array(
                "icon" => "fa-globe",
                "text" => "World Wide"
            ),
            3 => array(
                "icon" => "fa-recycle",
                "text" => "Nature Friendly"
            ),
            4 => array(
                "icon" => "fa-cube",
                "text" => "Less is More"
            )
        );
    ?>
    <?php if(!get_theme_mod("homepage_icons_disabled")){?>
        <div class="grid-100 grid-parent homepage_icons_wrap">
            <div class="max_1200">
                <ul class="homepage_icons grid-100 efct fade-in">

                    <?php for($i = 1; $i <= $number_of_icons; $i++){?>
                        <?php $icon_fontawesome_class = get_theme_mod('homepage_icon_setting_image_' . $i);?>
                        <?php $icon_text = get_theme_mod('homepage_icon_setting_text_' . $i);?>
                        <?php
                            if($icon_fontawesome_class == ''){
                                $icon_fontawesome_class = $demo_icons[$i]["icon"];
                            }
                            if($icon_text == ""){
                                $icon_text = $demo_icons[$i]["text"];
                            }
                        ?>
                        <li class="icon-<?=esc_html($i)?>">
                            <i class="fa <?=esc_html($icon_fontawesome_class)?>" aria-hidden="true"></i>
                            <p>
                                <?=esc_html($icon_text)?>
                            </p>
                        </li>
                    <?php }?>

                </ul>

                <?php if (user_can( $current_user, 'administrator' )) {?>
                    <div class="more-button-wrap efct fade-in"><div class="edit_link_wrap no_margin black_edit_post"><a class="post-edit-link" href="<?=get_site_url()?>/wp-admin/customize.php?autofocus[section]=homepage_icons_section"><?php _e("Edit Icons", "quiet_theme");?></a></div></div>
                <?php }?>
            </div>
        </div>
    <?php }?>
    <?php // End Homepage Icons ------------------------->?>

    <?php // youtube video ------------------------------>?>
    <?php
        $video_id = get_theme_mod('youtube_video', "dEzOuI5yI84");
        $video_height = get_theme_mod('homepage_youtube_video_height', "60");
    ?>
    <?php if(!get_theme_mod("homepage_video_disabled")){?>
        <div class="homepage_youtube_video_wrap efct fade-in" <?=($video_height) ? "style='height:" . $video_height . "vh'" : "" ;?>>
            <div id="youtube_background_video" class="youtube_background_video homepage_youtube_video" data-video-id="<?=esc_html($video_id)?>">
            </div>
            <div class="video_menu">
                <i id="expand_video_button" class="fa fa-expand" data-video-id="<?=esc_html($video_id)?>" aria-hidden="true"></i>
                <?php if (user_can( $current_user, 'administrator' )) {?>
                    <a href="<?=get_site_url()?>/wp-admin/customize.php?autofocus[section]=homepage_youtube_video_section"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <?php }?>
            </div>
        </div>
        <div class="youtube_full_video_wrap" data-video-id="<?=esc_html($video_id)?>">
            <div class="youtube_full_video" id="youtube_full_video" data-video-id="<?=esc_html($video_id)?>">
            </div>
            <div class="video_menu">
                <i id="close_video_button" class="fa fa-times" data-video-id="<?=esc_html($video_id)?>" aria-hidden="true"></i>
                <i id="mute_video_button" class="fa fa-volume-up" data-video-id="<?=esc_html($video_id)?>" aria-hidden="true"></i>
            </div>
        </div>

    <?php }?>
    <?php // End youtube video -------------------------->?>

    <?php // homepage team loop ------------------------->?>
    <?php $team = get_posts(array('post_type' => 'team'));?>
    <?php if( $team ){?>

        <div class="homepage_team_loop_wrap efct fade-in">
            <div class="max_900">

                <p class="homepage_team_loop_title">
                    <?php _e("Meet Our Team", "quiet_theme");?>
                </p>
                <div class="homepage_team_loop_inner_wrap">
                    <?php foreach($team as $team_member){?>


                        <div class="homepage_team_loop_member grid-25 mobile-grid-50 grid-parent">
                            <?php //var_dump($team_member);?>
                            <div class="homepage_team_loop_background" style="background-image:url(<?=get_the_post_thumbnail_url($team_member->ID)?>);">
                            </div>
                            <p class="homepage_team_loop_caption">
                                <?=esc_html($team_member->post_title)?><br />
                                <strong><?=get_post_meta($team_member->ID, "_mcf_position-text")[0]?></strong>
                                <div class="more-button-wrap">
                                    <?php edit_post_link("edit team member", '<div class="edit_link_wrap no_margin white_edit_post">', '</div>', $team_member->ID); ?>
                                </div>
                            </p>
                        </div>


                    <?php }?>
                </div>

            </div>
        </div>
        <div class="homepage_team_loop_gray_bottom_bar efct fade-in">
        </div>
    <?php }?>
    <?php // End homepage team loop --------------------->?>

</section>
<?php get_footer(); ?>
