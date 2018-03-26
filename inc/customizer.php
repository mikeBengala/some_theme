<?php

function quiet_customize_register($wp_customize) {
    // white logo ----------------------------------------->
    $wp_customize->add_setting('quiet_logo');
    $white_logo_args = array(
        'label' => 'White Logo (for dark backgrounds)',
        'section' => 'title_tagline',
        'settings' => 'quiet_logo'
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'quiet_logo', $white_logo_args));
    // end white logo ------------------------------------->

    // Black Logo ----------------------------------------->
    $wp_customize->add_setting('quiet_logo_2');
    $black_logo_args = array(
        'label' => 'Black Logo (for white backgrounds)',
        'section' => 'title_tagline',
        'settings' => 'quiet_logo_2',
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'quiet_logo_2', $black_logo_args));
    // End Black Logo ------------------------------------->

    // Register homepage template panel ------------------->
    $wp_customize->add_panel( 'homepage_template', array(
      'title' => __( 'Homepage Template Options' ),
      'description' => "lorem ipson", // Include html tags such as <p>.
      'priority' => 160, // Mixed with top-level-section hierarchy.
    ) );
    // End register homepage template panel --------------->

    // Register homepage icons section to panel ----------->
    $wp_customize->add_section( 'homepage_icons_section' , array(
        'title'    => "Service Icons",
        'priority' => 1,
        'panel' => 'homepage_template',
    ) );
    // End Register homepage icons section to panel ------->


    // Add icons to homepage template --------------------->

    $wp_customize->add_setting( 'control_icons_description', array() );

    $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'control_icons_description', array(
        'section' => 'homepage_icons_section',
        'priority' => 1,
        'label' => __( 'Service Icons', 'quiet_theme' ),
        'content' => __( '<p>This is your icons menu, pick your icons from <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Fontawesome v4.7.0</a>, write the desired icon class on the Fontawesome icon input below, and just type the desired text to go with your icon.', 'textdomain' ) . '</p>',
        'description' => __( '<p><br /><hr><br /></p>', 'textdomain' ),
    ) ) );

    $wp_customize->add_setting( 'homepage_icon_total' , array(
        'default'   => '8',
        'transport' => 'refresh',
        'type' => "theme_mod"
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'total_icons', array(
        'label'    => __( '', 'How many Icons?' ),
        'section'  => 'homepage_icons_section',
        'settings' => 'homepage_icon_total',
        'type'     => 'number',
        'description' => 'Total number of icons you desire',
        'priority' => 2,
    ) ) );

    $wp_customize->add_setting( "homepage_icons_disabled" , array(
        'transport' => 'refresh',
        'type' => "theme_mod"
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "homepage_icons_disabled", array(
        'label'    => __( 'quiet_theme', 'quiet_theme' ),
        'section'  => 'homepage_icons_section',
        'settings' => "homepage_icons_disabled",
        'type'     => 'checkbox',
        'description' => 'Check this to disable icon section on homepage',
        'priority' => 1,
    ) ) );

    $wp_customize->add_setting( 'homepage_icons_spacer_1', array() );

    $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'homepage_icons_spacer_1', array(
        'section' => 'homepage_icons_section',
        'priority' => 1,
        'label' => __( '', 'quiet_theme' ),
        'content' => __( '<p>', 'textdomain' ) . '</p>',
        'description' => __( '<p><br /><hr><br /></p>', 'textdomain' ),
    ) ) );

    $icon_number_count = get_theme_mod('homepage_icon_total', 8);
    for($i = 1; $i <= $icon_number_count; $i++){
        $wp_customize->add_setting( 'control'.$i, array() );

        $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'control'.$i, array(
        	'section' => 'homepage_icons_section',
        	'priority' => $i . 00,
        	'label' => __( 'Icon ' . $i, 'quiet_theme' ),
        	'content' => __( '<p>', 'textdomain' ) . '</p>',
        	'description' => __( ' ', 'textdomain' ),
        ) ) );
        $wp_customize->add_setting( 'homepage_icon_setting_image_' . $i , array(
            'default'   => '',
            'transport' => 'refresh',
            'type' => "theme_mod"
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'homepage_icon_'.$i.'_icon', array(
            'label'    => __( '', 'homepage_icon_'.$i.'_icon' ),
            'section'  => 'homepage_icons_section',
            'settings' => 'homepage_icon_setting_image_' . $i,
            'type'     => 'text',
            'description' => 'Fontawesome icon<br />(example: fa-address-book)',
            'priority' => $i . 01,
        ) ) );

        $wp_customize->add_setting( 'homepage_icon_setting_text_' . $i , array(
            'default'   => '',
            'transport' => 'refresh',
            'type' => "theme_mod"
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'homepage_icon_'.$i.'_text', array(
            'label'    => __( '', 'homepage_icon_'.$i.'_text' ),
            'section'  => 'homepage_icons_section',
            'settings' => 'homepage_icon_setting_text_'.$i,
            'type'     => 'text',
            'description' => 'Text to apear under the icon',
            'priority' => $i . 02,
        ) ) );

        $wp_customize->add_setting( 'control_spacer'.$i, array() );

        $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'control_spacer'.$i, array(
        	'section' => 'homepage_icons_section',
        	'priority' => $i . 03,
        	'label' => __( '', 'quiet_theme' ),
        	'content' => __( '<p>&nbsp;<br /><hr>&nbsp;<br />', 'textdomain' ) . '</p>',
        	'description' => __( ' ', 'textdomain' ),
        ) ) );
    }

    // Add icons to homepage template --------------------->

    // Register homepage youtube video section to panel --->
    $wp_customize->add_section( 'homepage_youtube_video_section' , array(
        'title'    => "Youtube Video",
        'priority' => 1,
        'panel' => 'homepage_template'
    ) );

    $wp_customize->add_setting( 'youtube_video' , array(
        'default'   => 'JA3olKf8ORU',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube_video', array(
        'label'    => __( 'Youtube video ID', 'quiet_theme' ),
        'section'  => 'homepage_youtube_video_section',
        'settings' => 'youtube_video',
    ) ) );

    $wp_customize->add_setting( 'homepage_youtube_video_height' , array(
        'default'   => '50%',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'homepage_youtube_video_height', array(
        'label'    => __( 'Youtube video Height', 'quiet_theme' ),
        'section'  => 'homepage_youtube_video_section',
        'settings' => 'homepage_youtube_video_height',
        'description' => 'type a number from 15 to 100, it will be converted to percentage of the browsers height',
        'type' => "number"
    ) ) );
    $wp_customize->add_setting( "homepage_video_disabled" , array(
        'transport' => 'refresh',
        'type' => "theme_mod"
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "homepage_video_disabled", array(
        'label'    => __( 'Disable Youtube Video', 'quiet_theme' ),
        'section'  => 'homepage_youtube_video_section',
        'settings' => "homepage_video_disabled",
        'type'     => 'checkbox',
        'description' => 'Check this to disable youtube video section on homepage',
        'priority' => 1,
    ) ) );
    // End Register homepage youtube video to panel ------->




    // Register Header Media section ---------------------->
    $wp_customize->add_section( 'header_media' , array(
        'title'    => __( 'Header Media', 'header_media' ),
        'priority' => 20
    ) );
    // End Header Media section --------------------------->

    // Header Image --------------------------------------->
    $wp_customize->add_setting('header_image');
    $header_image_args = array(
        'label' => 'Header Image',
        'section' => 'header_media',
        'settings' => 'header_image'
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image', $header_image_args));
    // End header image Logo ------------------------------>



    // Register about us template panel ------------------->
    $wp_customize->add_panel( 'about_us_template', array(
      'title' => __( 'About Us Template Options' ),
      'description' => "lorem ipson", // Include html tags such as <p>.
      'priority' => 160, // Mixed with top-level-section hierarchy.
    ) );
    //end Register about us template panel ---------------->

    // Register counter section on about us template panel >
    $wp_customize->add_section( 'about_us_counters' , array(
        'title'    => "Counters",
        'priority' => 2,
        'panel' => 'about_us_template',
    ) );
    // end Register counter section on about us template panel

    // counters loop -------------------------------------->
    $wp_customize->add_setting( 'about_us_counters' , array(
        'default'   => '4',
        'transport' => 'refresh',
        'type' => "theme_mod"
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'total_counters', array(
        'label'    => __( '', 'How many Counters?' ),
        'section'  => 'about_us_counters',
        'settings' => 'about_us_counters',
        'type'     => 'number',
        'description' => 'Total number of counters you desire',
        'priority' => 0,
    ) ) );

    $wp_customize->add_setting( "about_us_counters_disabled" , array(
        'transport' => 'refresh',
        'type' => "theme_mod"
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "about_us_counters_disabled", array(
        'label'    => __( 'Disable Counters', 'quiet_theme' ),
        'section'  => 'about_us_counters',
        'settings' => "about_us_counters_disabled",
        'type'     => 'checkbox',
        'description' => 'Check this to disable counters section on About Us Template',
        'priority' => 1
    ) ) );

    for($i = 1; $i <= get_theme_mod('about_us_counters', 4); $i ++){

        $wp_customize->add_setting( 'counter_title_control_'.$i, array() );

        $wp_customize->add_control( new Prefix_Custom_Content( $wp_customize, 'counter_title_control_' . $i, array(
        	'section' => 'about_us_counters',
        	'priority' => $i . 1,
        	'label' => __( '<hr><br /><br />Counter ' . $i, 'quiet_theme' ),
        	'content' => __( '<p>', 'textdomain' ) . '</p>',
        	'description' => __( '', 'textdomain' ),
        ) ) );


        $wp_customize->add_setting( 'counter_number_' . $i , array(
            'transport' => 'refresh',
            'type' => "theme_mod",
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'counter_number_control_' . $i, array(
            'label'    => __( 'Number to count to' ),
            'section'  => 'about_us_counters',
            'settings' => 'counter_number_' . $i,
            'type'     => 'number',
            'description' => 'The counter will increment from zero to the number you type here.',
            'priority' => $i . 2,
        ) ) );

        $wp_customize->add_setting( 'plus_sign_' . $i , array(
            'type'       => 'theme_mod',
            'transport' => 'refresh'
        ) );

        $wp_customize->add_control( 'plus_sign_control_' . $i , array(
            'label'      => __( 'Plus Sign' ),
            'section'    => 'about_us_counters',
            'settings'   => 'plus_sign_' . $i,
            'type'       => 'checkbox',
            'priority' => $i . 3,
        ) );

        $wp_customize->add_setting( 'counter_text_' . $i , array(
            'default'   => '',
            'transport' => 'refresh',
            'type' => "theme_mod"
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'counter_text_controler_' . $i, array(
            'label'    => __( 'Text under counter' ),
            'section'  => 'about_us_counters',
            'settings' => 'counter_text_' . $i,
            'type'     => 'text',
            'description' => 'example: Happy customers',
            'priority' => $i . 4,
        ) ) );
    }

    // end counters loop ---------------------------------->

    // Register about us youtube video section to panel --->
    $wp_customize->add_section( 'about_us_youtube_video_section' , array(
        'title'    => "Youtube Video",
        'priority' => 1,
        'panel' => 'about_us_template',
    ) );

    $wp_customize->add_setting( 'about_us_youtube_video' , array(
        'default'   => 'JA3olKf8ORU',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about_us_youtube_video', array(
        'label'    => __( 'Youtube video ID', 'quiet_theme' ),
        'section'  => 'about_us_youtube_video_section',
        'settings' => 'about_us_youtube_video',
        'type' => "text"
    ) ) );

    $wp_customize->add_setting( 'about_us_youtube_video_height' , array(
        'default'   => '50%',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about_us_youtube_video_height', array(
        'label'    => __( 'Youtube video Height', 'quiet_theme' ),
        'section'  => 'about_us_youtube_video_section',
        'settings' => 'about_us_youtube_video_height',
        'description' => 'type a number from 15 to 100, it will be converted to percentage of the browsers height',
        'type' => "number"
    ) ) );
    $wp_customize->add_setting( "about_us_video_disabled" , array(
        'transport' => 'refresh',
        'type' => "theme_mod"
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "about_us_video_disabled", array(
        'label'    => __( 'Disable Youtube Video', 'quiet_theme' ),
        'section'  => 'about_us_youtube_video_section',
        'settings' => "about_us_video_disabled",
        'type'     => 'checkbox',
        'description' => 'Check this to disable youtube video section on About Us Template',
        'priority' => 1
    ) ) );
    // End Register about us youtube video to panel ------->

    // Register contacts panel ---------------------------->
    $wp_customize->add_panel( 'contacts_template', array(
      'title' => __( 'Contacts' ),
      'description' => "Your Phone, Address and Social Media contacts.",
      'priority' => 160
    ) );
    // End register homepage template panel --------------->

    // Register footer section ---------------------------->
    $wp_customize->add_section( 'footer_section' , array(
        'title'    => __( 'Contacts', 'footer' ),
        'priority' => 1,
        'panel' => 'contacts_template'
    ) );
    // End Footer section --------------------------------->

    // Register credits section --------------------------->
    $wp_customize->add_section( 'credits_section' , array(
        'title'    => __( 'Credits', 'footer' ),
        'priority' => 5,
        'panel' => 'contacts_template'
    ) );
    // End credits section -------------------------------->

    // Footer title 1 on footer section ------------------->
    $wp_customize->add_setting( 'title_1' , array(
        'default'   => 'Quiet Theme',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_1', array(
        'label'    => __( 'Title Left Column', 'footer' ),
        'section'  => 'footer_section',
        'settings' => 'title_1',
    ) ) );
    // end Footer title 1 --------------------------------->

    // Footer content 1 on footer section ----------------->
    $wp_customize->add_setting( 'content_1' , array(
        'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'content_1', array(
        'label'    => __( 'Content Left Column', 'footer' ),
        'section'  => 'footer_section',
        'settings' => 'content_1',
        'type'     => 'textarea'
    ) ) );
    // end Footer content 1 ------------------------------->

    // Footer title 2 on footer section ------------------->
    $wp_customize->add_setting( 'title_2' , array(
        'default'   => 'Contact us',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_2', array(
        'label'    => __( 'Title Right Column', 'footer' ),
        'section'  => 'footer_section',
        'settings' => 'title_2',
    ) ) );
    // end Footer title 2 --------------------------------->

    // Footer content 2 on footer section ----------------->
    $wp_customize->add_setting( 'content_2' , array(
        'default'   => 'Gold Street, Lisbon<br />Phone: 920 000 000<br />Fax: 282 000 000<br />Email: support@example.com',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'content_2', array(
        'label'    => __( 'Content Right Column', 'footer' ),
        'section'  => 'footer_section',
        'settings' => 'content_2',
        'type'     => 'textarea'
    ) ) );
    // end Footer content 2 ------------------------------->

    // Footer credits on footer section ------------------->
    $wp_customize->add_setting( 'credits' , array(
        'default'   => 'Quiet theme developed by gfn.pt',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'credits', array(
        'label'    => __( 'Bottom website credits', 'footer' ),
        'section'  => 'credits_section',
        'settings' => 'credits',
    ) ) );
    // end Footer credits --------------------------------->

    // Register google maps --------------------------------------->
    $wp_customize->add_section( 'google_maps' , array(
        'title'    => __( 'Google Maps', 'google_maps' ),
        'priority' => 10,
        'panel' => 'contacts_template'
    ) );
    // End google maps -------------------------------------------->

    // add lat coorginates link to google maps ------------------------>
    $wp_customize->add_setting( 'maps_lat' , array(
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maps_lat', array(
        'label'    => __( "Latitude", 'quiet_theme' ),
        'section'  => 'google_maps',
        'settings' => 'maps_lat',
        'type'     => 'text'
    ) ) );
    // end lat coorginates link to google maps  ----------------------->

    // add long coorginates link to google maps ------------------------>
    $wp_customize->add_setting( 'maps_long' , array(
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maps_long', array(
        'label'    => __( "Longitude", 'quiet_theme' ),
        'section'  => 'google_maps',
        'settings' => 'maps_long',
        'type'     => 'text'
    ) ) );
    // end lat coorginates link to google maps  ----------------------->


    // add zoom coorginates link to google maps ------------------------>
    $wp_customize->add_setting( 'maps_zoom' , array(
        'default'   => 5,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maps_zoom', array(
        'label'    => __( "Zoom", 'quiet_theme' ),
        'section'  => 'google_maps',
        'settings' => 'maps_zoom',
        'type'     => 'number'
    ) ) );
    // end lat coorginates link to google maps  ----------------------->


    $wp_customize->add_section( 'contact_form' , array(
        'title'    => __( 'Contact Form', 'quiet_theme' ),
        'priority' => 10,
        'panel' => 'contacts_template'
    ) );

    $wp_customize->add_setting( 'contact_form_email_setting' , array(
        'transport' => 'refresh'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_form_email', array(
        'label'    => __( "The email recipient", 'quiet_theme' ),
        'description' => 'The contact form on the contacts page template will send all messages to the email address you type here.',
        'section'  => 'contact_form',
        'settings' => 'contact_form_email_setting',
        'type'     => 'email'
    ) ) );


    $wp_customize->add_section( 'colors' , array(
        'title'    => __( 'Colors', 'quiet_theme' ),
        'priority' => 10
    ) );

    $wp_customize->add_setting( 'core_color', array(
      'default' => "#ffa34c"
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'core_color_setting_id', array(
        'label' => __( 'Core Color Setting', "quiet_theme" ),
        'description' => __( 'Select a color for details', "quiet_theme" ),
        'section' => 'colors',
        'settings' => "core_color"
    ) ) );
}
add_action('customize_register', 'quiet_customize_register');
?>
<?php
/**
 * Add Custom social media menu
 */
class tmosestBlog_Customize {

  public static function register ( $wp_customize ) {
    tmosestBlog_Customize::addSocialLinks($wp_customize);
  }


  public static function addSocialLinks( $wp_customize ) {
    // adding section in wordpress customizer
    $wp_customize->add_section('socialmedia_extras_section', array(
      'title' => 'Social Media Links',
      'panel' => 'contacts_template',
      'priority' => 2
    ));
    // adding setting for twitter text url
    $wp_customize->add_setting('twitter_setting', array(
      'default'        => 'https://www.twitter.com/',
    ));
    // adding control for twitter text url
    $wp_customize->add_control('twitter_setting', array(
      'label'   => 'Twitter URL',
      'section' => 'socialmedia_extras_section',
      'type'    => 'text',
    ));
    // adding setting for linkined text url
    $wp_customize->add_setting('linkined_setting', array(
      'default'        => 'https://www.linkedin.com/',
    ));
    // adding control for linkined text url
    $wp_customize->add_control('linkined_setting', array(
      'label'   => 'Linkedin URL',
      'section' => 'socialmedia_extras_section',
      'type'    => 'text',
    ));
    // adding setting for rss feed text url
    $wp_customize->add_setting('rss_setting', array(
      'default'        => site_url().'/feed',
    ));
    // adding control for rss feed text url
    $wp_customize->add_control('rss_setting', array(
      'label'   => 'RSS feed URL',
      'section' => 'socialmedia_extras_section',
      'type'    => 'text',
    ));
    // adding setting for google plus text url
    $wp_customize->add_setting('googleplus_setting', array(
      'default'        => 'https://plus.google.com/',
    ));
    // adding control for google plus text url
    $wp_customize->add_control('googleplus_setting', array(
      'label'   => 'Google + URL',
      'section' => 'socialmedia_extras_section',
      'type'    => 'text',
    ));
    // adding setting for facebook text url
    $wp_customize->add_setting('facebook_setting', array(
      'default'        => 'https://www.facebook.com/',
    ));
    // adding control for facebook text url
    $wp_customize->add_control('facebook_setting', array(
      'label'   => 'Facebook URL',
      'section' => 'socialmedia_extras_section',
      'type'    => 'text',
    ));
    // adding setting for Youtube text url
    $wp_customize->add_setting('youtube_setting', array(
      'default'        => 'https://www.facebook.com/',
    ));
    // adding control for Youtube text url
    $wp_customize->add_control('youtube_setting', array(
      'label'   => 'Youtube URL',
      'section' => 'socialmedia_extras_section',
      'type'    => 'text',
    ));
    // adding setting for Github text url
    $wp_customize->add_setting('github_setting', array(
      'default'        => 'https://www.github.com/',
    ));
    // adding control for Github text url
    $wp_customize->add_control('github_setting', array(
      'label'   => 'Github URL',
      'section' => 'socialmedia_extras_section',
      'type'    => 'text',
    ));
  }
}
add_action( 'customize_register' , array( 'tmosestBlog_Customize' , 'register' ) );



if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Prefix_Custom_Content' ) ) :
class Prefix_Custom_Content extends WP_Customize_Control {

	// Whitelist content parameter
	public $content = '';

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function render_content() {
		if ( isset( $this->label ) ) {
			echo '<span class="customize-control-title">' . $this->label . '</span>';
		}
		if ( isset( $this->content ) ) {
			echo $this->content;
		}
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
	}
}
endif;
?>
