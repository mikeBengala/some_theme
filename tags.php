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

        <div id="container">
            <div id="content">

                <?php the_post(); ?>

				<h1 class="page-title"><?php _e( 'Tag Archives:', 'quiet_theme' ) ?> <span><?php single_tag_title() ?></span></h1>
                <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs("white"); ?>
				<?php rewind_posts(); ?>

				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				                <div id="nav-above" class="navigation">
				                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'quiet_theme' )) ?></div>
				                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'quiet_theme' )) ?></div>
				                </div><!-- #nav-above -->
				<?php } ?>

				<?php while ( have_posts() ) : the_post(); ?>

				                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'quiet_theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				                    <div class="entry-meta">
				                        <span class="meta-prep meta-prep-author"><?php _e('By ', 'quiet_theme'); ?></span>
				                        <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'quiet_theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
				                        <span class="meta-sep"> | </span>
				                        <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'quiet_theme'); ?></span>
				                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
				                        <?php edit_post_link( __( 'Edit', 'quiet_theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
				                    </div><!-- .entry-meta -->

				                    <div class="entry-summary">
				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'quiet_theme' )  ); ?>
				                    </div><!-- .entry-summary -->

				                    <div class="entry-utility">
				                        <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'quiet_theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
				                        <span class="meta-sep"> | </span>
				                        <?php if ( $tag_ur_it = tag_ur_it(', ') ) : // Returns tags other than the one queried ?>
										                        <span class="tag-links"><?php printf( __( 'Also tagged %s', 'quiet_theme' ), $tag_ur_it ) ?></span>
										<?php endif; ?>
				                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'quiet_theme' ), __( '1 Comment', 'quiet_theme' ), __( '% Comments', 'quiet_theme' ) ) ?></span>
				                        <?php edit_post_link( __( 'Edit', 'quiet_theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
				                    </div><!-- #entry-utility -->
				                </div><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; ?>

				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				                <div id="nav-below" class="navigation">
				                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'quiet_theme' )) ?></div>
				                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'quiet_theme' )) ?></div>
				                </div><!-- #nav-below -->
				<?php } ?>

            </div><!-- #content -->
			<?php get_sidebar(); ?>
        </div><!-- #container -->

<?php get_footer(); ?>
