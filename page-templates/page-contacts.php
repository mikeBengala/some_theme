<?php
/**
 * Template Name: Contacts Page
 */
get_header();
$menu_background_colors = (object) array(
    "before_scroll" => "white",
    "after_scroll" => "white",
    "transparent_while_on_top" => true
);
set_query_var( 'background_colors', $menu_background_colors );
get_template_part( 'parts/header_menu', 'background_colors' );
$map = false;
$map_lat = get_theme_mod(  'maps_lat' , "40.741895" );
$map_long = get_theme_mod(  'maps_long' , "-73.989308" );
$post_id = get_the_ID();
if(has_post_thumbnail()){
    $background_image = get_the_post_thumbnail_url($post_id, 'full');
}else if(get_theme_mod('header_image')){
    $background_image = get_theme_mod('header_image');
}else{
    $background_image = get_template_directory_uri() . "/static/img/header.jpg";
}
?>
<section id="main" data-page="contacts">
    <div class="title_header grid-100 no-background">
        <h1><?php the_title(); ?></h1>
        <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs("black"); ?>
    </div>

    <?php if($map_lat && $map_long){?>
        <div id="map" class="google_maps_wrap grid-100 grid-parent">
        </div>
    <?php }?>
    <div class="contact_page_contacts grid-100 grid-parent efct fade-in">
        <div class="max_900">

                <div class="footer_column">
                    <p class="footer_title">
                        <?= get_theme_mod('title_1', "Quiet Theme");?>
                    </p>
                    <p class="footer_content">
                        <?= get_theme_mod('content_1', "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.");?>
                    </p>
                    <?php get_template_part( "parts/social_menu" );?>
                </div>
                <div class="footer_column">
                    <p class="footer_title">
                        <?= get_theme_mod('title_2', "Contact us");?>
                    </p>
                    <p class="footer_content">
                        <?= get_theme_mod('content_2', "Gold Street, Lisbon<br />Phone: 920 000 000<br />Fax: 282 000 000<br />Email: support@example.com");?>
                    </p>
                </div>

        </div>
    </div>
    <div class="contact_form_wrap parallax" data-image-src="<?=esc_url($background_image)?>">
        <form id="contact_form" class="contact_form quiet_form" action="">
            <p class="contact_form_title"><?php _e("Send us a Message", "quiet_theme")?></p>
            <div class="grid-33">
                <p>
                    <label for="name"><?php _e("Your Name", "quiet_theme")?></label>
                    <input id="name" name="Name" type="text" placeholder="Type Your name Here" data-required="true">
                </p>
            </div>
            <div class="grid-33">
                <p>
                    <label for="email"><?php _e("Your Email", "quiet_theme")?></label>
                    <input id="email" name="Email" type="email" placeholder="<?php _e("Type Your Email Here", "quiet_theme")?>" data-required="true">
                </p>
            </div>
            <div class="grid-33">
                <p>
                    <label for="phone"><?php _e("Your Phone Number", "quiet_theme")?></label>
                    <input id="phone" name="Phone_Number" type="tel" placeholder="<?php _e("Type Your Phone Number Here", "quiet_theme")?>" data-required="true">
                </p>
            </div>
            <div class="grid-100">
                <p>
                    <label for="message"><?php _e("Your Message", "quiet_theme")?></label>
                    <textarea id="message" name="The_Message" placeholder="Type Your Message Here"></textarea>
                </p>
            </div>
            <div class="grid-100">
                <input type="submit" value="<?php _e("Send Message", "quiet_theme")?>">
                <?php if (user_can( wp_get_current_user(), 'administrator' )) {?>
                    <div class="more-button-wrap">
                        <div class="edit_link_wrap no_margin margin_on_top white_edit_post">
                            <a class="post-edit-link" href="<?=get_site_url()?>/wp-admin/customize.php?autofocus[section]=contact_form">
                                <?php _e("Edit Contact Form", "quiet_theme");?>
                            </a>
                        </div>
                    </div>
                <?php }?>


            </div>
        </form>
    </div>
</section>

<?php if($map_lat && $map_long){?>
    <script>
      function initMap() {
        var location = {lat: <?=esc_html($map_lat)?>, lng: <?=esc_html($map_long)?>};
        var styleArray = [
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    },
                    {
                        "lightness": "-30"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#f4f4f4"
                    },
                    {
                        "weight": "3.68"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    },
                    {
                        "lightness": "20"
                    },
                    {
                        "saturation": "38"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels",
                "stylers": [
                    {
                        "color": "#ffffff"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    },
                    {
                        "lightness": "7"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "hue": "#ff6100"
                    },
                    {
                        "lightness": "21"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    },
                    {
                        "lightness": "39"
                    },
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "simplified"
                    },
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    },
                    {
                        "lightness": "3"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    },
                    {
                        "lightness": "-19"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "<?= get_theme_mod("core_color", "#FFA34C")?>"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            }
        ];
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: <?=get_theme_mod('maps_zoom', 7);?>,
          center: location,
          styles: styleArray,
          disableDefaultUI: true
        });
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
      }
    </script>
<?php }?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3DEBiCt9C4LOF_6UvJq2HNEPdHAYsbF0&callback=initMap"></script>
<?php get_footer(); ?>
