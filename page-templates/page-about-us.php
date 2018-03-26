<?php
/**
 * Template Name: About Us
 */
get_header();
$menu_background_colors = (object) array(
    "before_scroll" => "white",
    "after_scroll" => "white",
    "transparent_while_on_top" => false
);
set_query_var( 'background_colors', $menu_background_colors );
get_template_part( 'parts/header_menu', 'background_colors' );
?>
<section id="main" data-page="about_us">
    <?php // about us post stage ------------------------>?>
    <?php if (have_posts()) { while (have_posts()){ the_post(); ?>
        <div id="content" class="about_us_stage page_content_container">
            <div class="max_900">

                    <div class="page_post_wrap">
                        <hr class="about_us_line">

                        <h2 class="about_us_title"><?php the_title();?></h2>
                        <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs("black text-align-left efct fade-in"); ?>

                        <?php if(has_post_thumbnail()){?>
                            <img class="about_us_picture efct fade-in" src="<?=get_the_post_thumbnail_url(get_the_ID(),'full')?>" alt="<?=get_the_post_thumbnail_caption()?>">
                        <?php }?>
                        <div class="about_us_content grid-100 grid-parent efct fade-in">
                            <?php the_content();?>
                        </div>
                    </div>

            </div>
        </div>
    <?php }}?>
    <?php // end about us post stage -------------------->?>

    <?php // youtube video ------------------------------>?>
    <?php $video_id = get_theme_mod('about_us_youtube_video', "JA3olKf8ORU");?>
    <?php $video_height = get_theme_mod('about_us_youtube_video_height');?>
    <?php if(!get_theme_mod("about_us_video_disabled")){?>
        <div class="about_us_youtube_video_wrap efct fade-in" <?=($video_height) ? 'style="height:' . $video_height . 'vh"' : "";?>>
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
                <i id="mute_video_button" class="fa fa-volume-up" aria-hidden="true"></i>
            </div>
        </div>
    <?php }?>
    <?php // End youtube video -------------------------->?>

    <?php // customers carousel ------------------------->?>

    <?php $customers = get_posts(array('post_type' => 'customer_logos'));?>
    <?php if($customers){?>
        <div class="customers_carousel_wrap grid-100 grid-parent">
            <div class="max_900">
                <div class="regular_padding">
                    <p class="customers_title efct fade-in"><?php _e("Some of our customers", "quiet_theme");?></p>
                    <hr class="customers_title_underline efct fade-in">

                    <div class="olw-customers owl-carousel olw-theme efct fade-in">

                        <?php foreach($customers as $customer){?>
                            <div class="item">
                                <img class="customer_logo" src="<?=get_the_post_thumbnail_url($customer->ID, "full");?>" alt="<?=esc_html($customer->post_title)?>">
                            </div>
                        <?php }?>

                    </div>

                </div>
            </div>
        </div>
    <?php }?>
    <?php // end customers carousel --------------------->?>

    <?php // Counters ----------------------------------->?>
    <?php $total_number_of_counters = get_theme_mod('about_us_counters', 4);?>
    <?php if(!get_theme_mod("about_us_counters_disabled")){?>
        <?php
            $demo_counters = array(
                1 => array(
                    "number" => "10",
                     "text" => "Years of Experience",
                     "plus_sign" => false
                ),
                2 => array(
                    "number" => "307",
                     "text" => "Happy Customers",
                     "plus_sign" => true
                ),
                3 => array(
                    "number" => "8",
                     "text" => "Offices",
                     "plus_sign" => false
                ),
                4 => array(
                    "number" => "7500",
                     "text" => "Coffes",
                     "plus_sign" => true
                )
            );
        ?>


        <div class="acomplishments_counter_wrap grid-100 grid-parent efct fade-in">
            <div class="max_900">
                <div class="regular_padding">
                    <ul class="acomplishments_counter">


                        <?php for($i = 1; $i <= $total_number_of_counters; $i++){?>

                            <?php
                                $counter_number = get_theme_mod('counter_number_' . $i);
                                $counter_text = get_theme_mod('counter_text_' . $i);
                                $plus_sign = get_theme_mod( 'plus_sign_' . $i );

                                if($counter_number == "" || $counter_number == false){
                                    $counter_number = $demo_counters[$i]["number"];
                                }
                                if($counter_text == "" || $counter_text == false){
                                    $counter_text = $demo_counters[$i]["text"];
                                }
                                if($plus_sign == ""){
                                    $plus_sign = $demo_counters[$i]["plus_sign"];
                                }
                            ?>

                            <li class="efct fade-in delay_0_5s">
                                <p>
                                    <?php
                                        if($plus_sign){
                                            echo "+";
                                        }  else{
                                            echo "";
                                        }
                                    ?>
                                    <span class="number" data-number="<?=esc_html($counter_number)?>">0</span>
                                </p>
                                <small><?=esc_html($counter_text)?></small>
                            </li>


                        <?php }?>


                    </ul>
                </div>
            </div>
        </div>


    <?php }?>

    <?php // End Counters ------------------------------->?>
</section>
<?php get_footer(); ?>
