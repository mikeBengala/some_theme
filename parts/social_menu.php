<?php
    $social_menu_options = array(
        "twitter" => (object) array(
            "icon_class" => "fa fa-twitter",
            "href" => get_theme_mod("twitter_setting")
        ),
        "linkedin" => (object) array(
            "icon_class" => "fa fa-linkedin",
            "href" => get_theme_mod("linkined_setting")
        ),
        "rss" => (object) array(
            "icon_class" => "fa fa-rss",
            "href" => get_theme_mod("rss_setting")
        ),
        "google+" => (object) array(
            "icon_class" => "fa fa-google-plus",
            "href" => get_theme_mod("googleplus_setting")
        ),
        "facebook" => (object) array(
            "icon_class" => "fa fa-facebook",
            "href" => get_theme_mod("facebook_setting")
        ),
        "youtube" => (object) array(
            "icon_class" => "fa fa-youtube-play",
            "href" => get_theme_mod("youtube_setting")
        ),
        "github" => (object) array(
            "icon_class" => "fa fa-github",
            "href" => get_theme_mod("github_setting")
        ),

        // Example of custom icon --------------------------------------->

        /*
        "your custom social media icon" => (object) array(
            "icon_class" => "the class in which you will use css customization for your icon",
            "href" => "The url for your custom social media link"
        )
        */

        // end Example of custom icon ----------------------------------->

    );
?>
<nav class="social_media_menu">
    <ul>
        <?php foreach($social_menu_options as $social){?>
            <?php if($social->href){?>
                <li>
                    <a href="<?= esc_url($social->href)?>" target="_blank"><i class="<?=esc_html($social->icon_class)?>"></i></a>
                </li>
            <?php }?>
        <?php }?>
    </ul>
</nav>
