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
<?php $background_image = get_theme_mod('header_image');?>
    <section id="main" data-page="page-serach" class="search_results">

        <div class="title_header grid-100 parallax" data-image-src="<?=esc_url($background_image)?>">
            <?php if ( have_posts() ) { ?>
                <h1><?php _e( 'Search Results for: ' , "quiet_theme"); ?><span><?php the_search_query(); ?></span></h1>
            <?php }else {?>
                <h1><?php _e( 'Nothing Found', "quiet_theme") ?></h1>
            <?php }?>
            <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs("white"); ?>
        </div>

        <div id="content" class="page_content_container">
            <div class="max_900">
                <div class="page_post_wrap">

    				<?php if ( have_posts() ) { ?>

    				<?php while ( have_posts() ) { the_post() ?>

			                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'quiet_theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                				<?php if ( $post->post_type == 'post' ) { ?>
            	                    <div class="entry-meta">
            	                        <span class="meta-prep meta-prep-author"><?php _e('By ', 'quiet_theme'); ?></span>
            	                        <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'quiet_theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
            	                        <span class="meta-sep"> | </span>
            	                        <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'quiet_theme'); ?></span>
            	                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
            	                        <?php edit_post_link( __( 'Edit', 'quiet_theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
            	                    </div><!-- .entry-meta -->
                				<?php } ?>

                				                    <div class="entry-summary">
                				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'quiet_theme' )  ); ?>
                				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'quiet_theme' ) . '&after=</div>') ?>
                				                    </div><!-- .entry-summary -->

                				<?php if ( $post->post_type == 'post' ) { ?>
            	                    <div class="entry-utility">
            	                        <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'quiet_theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
            	                        <span class="meta-sep"> | </span>
            	                        <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'quiet_theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
            	                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'quiet_theme' ), __( '1 Comment', 'quiet_theme' ), __( '% Comments', 'quiet_theme' ) ) ?></span>
            	                        <?php edit_post_link( __( 'Edit', 'quiet_theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
            	                    </div><!-- #entry-utility -->
                				<?php } ?>
			                </div><!-- #post-<?php the_ID(); ?> -->

    				<?php } ?>

    				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                            <div id="nav-below" class="navigation">
            					<div class="prev"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts' )) ?></div>
                                <div class="next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>')) ?></div>
            				</div><!-- #nav-below -->
    				<?php } ?>

                    <?php }else { ?>

    	                <div id="post-0" class="post no-results not-found">
    	                    <div class="entry-content">
    	                        <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'quiet_theme' ); ?></p>
    	                    </div><!-- .entry-content -->
    	                </div>

    				<?php } ?>

                </div><!-- #content -->
            </div>
        </div><!-- #container -->
    </section>
<?php get_footer(); ?>
