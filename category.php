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
    $header_image = get_theme_mod('header_image');
?>
<div id="main">
    <div class="title_header grid-100 parallax" data-image-src="<?=esc_url($header_image)?>">
        <h1><?php _e("Category: ", "quiet_theme") . single_cat_title() ?></h1>
        <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs("white"); ?>
    </div>
    <div id="content">
        <div class="max_900">
            <div class="page_loop_wrap">

                <?php if (have_posts()) {?>

                    <?php //The loop -------------------------------------->?>

                    <?php $count = 0;?>
                    <?php while (have_posts()){ the_post(); ?>
                        <?php $count = $count + 1;?>
                        <article class="post grid-50 mobile-force-padding-out">

                            <?php //Post Picture -------------------------------------->?>
                            <a href="<?=the_permalink();?>">
                                <div class="the_post_thumbnail efct fade-in">
                                    <?php if(has_post_thumbnail()){?>
                                        <?=the_post_thumbnail('medium_large')?>
                                    <?php }else{?>
                                        <img src="<?=get_template_directory_uri()?>/static/img/picture_unavailable.jpg" alt="<?php the_title();?>" />
                                    <?php }?>
                                </div>
                            </a>
                            <?php //End Post Picture----------------------------------->?>

                            <?php //Text based contents ------------------------------->?>
                            <div class="the_post_content">

                                <?php //Post Date and Categories--------------------------->?>
                                <p class="date_category efct fade-in">
                                    <?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?>
                                    |

                                    <?php
                                        $cats = get_the_category();
                                        $cat_count = 0;
                                    ?>
                                    <?php foreach($cats as $cat){?>
                                        <?php
                                            if($cat_count > 0){
                                                _e(",");
                                            }
                                            $cat_count++;
                                        ?>

                                        <a class="the_post_cat" href="<?=get_category_link($cat->cat_ID)?>">
                                            <?=esc_html($cat->name)?>
                                        </a>
                                    <?php }?>
                                </p>
                                <?php //End Post Date and Categories----------------------->?>

                                <?php //Post Title----------------------------------------->?>
                                <a href="<?=the_permalink();?>">
                                    <h1 class="the_post_title efct fade-in"><?php the_title();?></h1>
                                </a>
                                <?php //End Post Title------------------------------------->?>

                                <?php //Post Content excerpt------------------------------->?>
                                <div class="the_post_excerpt efct fade-in">
                                    <?php the_excerpt(); ?>
                                </div>
                                <?php //End Post Content excerpt--------------------------->?>

                                <hr class="efct fade-in">

                                <?php //Read more and edit button-------------------------->?>
                                <div class="the_post_buttons efct fade-in">
                                    <a href="<?=the_permalink();?>"><?php _e("Read More", "quiet_theme");?></a>
                                    <?php edit_post_link(); ?>
                                </div>
                                <?php //end Read more and edit button---------------------->?>

                            </div>
                            <?php //end Text based contents --------------------------->?>

                        </article>

                        <?php if($count % 2 == 0){?>
                            <div class="clear"></div>
                        <?php }else{?>
                            <div class="clear hide-on-desktop"></div>
                        <?php }?>

                    <?php }?>
                    <?php //end The loop ---------------------------------->?>

                    <?php //Pagination ------------------------------------>?>
        			<?= pagination_bar();?>
                    <?php //end Pagination -------------------------------->?>

                <?php } else{ ?>

                    <p class="no_posts efct fade-in"><?php _e('No Posts Found', "quiet_theme"); ?></p>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
