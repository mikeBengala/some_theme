<?php //header bar------------------------------------------>?>
<div id="header" class="white" data-before-scroll-background="<?=esc_html($background_colors->before_scroll)?>" data-after-scroll-background="<?=esc_html($background_colors->after_scroll)?>" data-transparent-while-on-top="<?=esc_html($background_colors->transparent_while_on_top)?>">

    <?php //logo-------------------------------------->?>
    <a id="logoWrapper" href="<?=get_site_url()?>">

        <?php if(get_theme_mod( 'quiet_logo' )){ ?>

            <img class="white_logo" src="<?= get_theme_mod( 'quiet_logo' );?>" alt=""/>
            <?php if(get_theme_mod( 'quiet_logo_2' )){?>
                <img class="black_logo" src="<?= get_theme_mod( 'quiet_logo_2' );?>" alt=""/>
            <?php } else{?>
                <img class="fake_black_logo" src="<?= get_theme_mod( 'quiet_logo' );?>" alt=""/>
            <?php }?>

        <?php } else{?>

            <p class="text_logo"><?= bloginfo('name')?></p>

        <?php }?>
    </a>
    <?php //end logo-------------------------------------->?>

    <?php //desktop menu ----------------------------------->?>
    <nav id="desktop_menu" class="hide-on-mobile">
        <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
        <i class="fa fa-search search_toggle" aria-hidden="true"></i>
    </nav>
    <?php //end desktop menu -------------------------------------->?>

    <?php //Toggle mobile menu button ----------------------------->?>
    <div class="menu_toggle">
        <span></span>
    </div>
    <?php //End Toggle mobile menu button-------------------------->?>

    <?php //desktop search form ----------------------------------->?>
    <div id="desktop_search_menu_wrap">
        <form role="search" method="get" id="searchform" class="searchform" action="<?=get_site_url()?>">
            <div>
                <label class="screen-reader-text" for="s">Search for:</label>
                <input type="text" value="" name="s" id="s" placeholder="<?php _e("Type your search here", "quiet_theme")?>">
                <input type="submit" id="searchsubmit" value="Search">
            </div>
        </form>
    </div>
    <?php //End desktop search form ------------------------------->?>
</div>
<?php //end header bar-------------------------------------->?>

<?php //mobile menu ---------------------------------------->?>
<div id="mobile_menu">
    <div class="inner_mobile_menu">
        <div class="inner_mobile_menu_max_width">
            <?=get_search_form();?>

            <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
        </div>
    </div>
</div>
<?php // end mobile menu ----------------------------------->?>
