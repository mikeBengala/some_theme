    <?php

function add_one_click_setup_to_admin_menu() {
	add_options_page( 'One click setup', 'One click demo Setup', 'manage_options', 'one-click-setup-quiet-theme', 'add_one_click_setup_options_page' );
}add_action( 'admin_menu', 'add_one_click_setup_to_admin_menu' );


function add_one_click_setup_options_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
?>
<div class="wrap">
    <p class="description"><br /><?php _e("One click setup works better in a fresh wordpress install.<br />Results may be unexpected if your website already has posts, pages and menus.", "quiet_theme")?></p>
    <h1 class="wp-heading-inline"><?php _e("One click demo setup", "quiet_theme")?></h1>
    <br /><br />
    <p class="import_message"></p>
    <div class="loading_wrap" style="display:none;">
        <h3><?php _e("Loading...", "quiet_theme")?></h2>
        <div class="loader">
          <div id="largeBox"></div>
          <div id="smallBox"></div>
        </div>
    </div>
    <br /><br />
    <div class="this_option">
        <p class="about-description" style="text-align:center;"><?php _e("Quiet Demo Original", "quiet_theme")?></p>
        <div class="this_picture_wrap">
            <img src="<?=get_template_directory_uri()?>/static/img/demo_original.jpg" alt="" />
        </div>
        <div class="this_button_wrap">
            <button id="original" class="bootstrapguru_import button button-primary" style="display:inline-block;"><?php _e("Setup now", "quiet_theme")?></button>
        </div>
    </div>
    <div class="this_option">
        <p class="about-description" style="text-align:center;"><?php _e("Quiet Demo Blue", "quiet_theme")?></p>
        <div class="this_picture_wrap">
            <img src="<?=get_template_directory_uri()?>/static/img/demo_blue.jpg" alt="" />
        </div>
        <div class="this_button_wrap">
            <button id="blue" class="bootstrapguru_import button button-primary" style="display:inline-block;"><?php _e("Setup now", "quiet_theme")?></button>
        </div>
    </div>
</div>
<style>
    .this_option{
        float:left;
        margin:0 10px 10px 0;
        width:200px;
        background:#fff;
    }

    .import_message{
        width:100%;
    }
    .this_button_wrap{
        width:100%; max-width:200px; position:relative; padding:10px 0; background:#fff; text-align:center;
    }
    .this_picture_wrap{
        width:100%; max-width:200px; overflow:hidden; position:relative; background:#fff; height:300px;
    }
    .this_picture_wrap img{
        width:100%;
        left:0;
        top:0;
        transition:top 3s ease;
        position:absolute;
    }
    .this_option:hover .this_picture_wrap img{
        top:-520px;
    }
    .about-description{
        float:left;
        width:100%;
        text-align:center;
    }
    .loader {
      width: 3em;
      height: 3em;
      animation: loaderAnim 1.25s infinite ease-in-out;
      outline: 1px solid transparent;
    }
    .loader #largeBox {
      height: 3em;
      width: 3em;
      background-color: #ECECEC;
      outline: 1px solid transparent;
      position: fixed;
    }
    .loader #smallBox {
      height: 3em;
      width: 3em;
      background-color: #34495e;
      position: fixed;
      z-index: 1;
      outline: 1px solid transparent;
      animation: smallBoxAnim 1.25s alternate infinite ease-in-out;
    }

    @keyframes smallBoxAnim {
      0% {
        transform: scale(0.2);
      }
      100% {
        transform: scale(0.75);
      }
    }
    @keyframes loaderAnim {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(90deg);
      }
    }
</style>
<script>
    (function($) {
        "use strict";
            $('.bootstrapguru_import').click(function(){
                $('.import_message').html('<?php _e("Please wait while we setup your theme, this may take some time", "quiet_theme")?>');
                $('.loading_wrap').show();
                $(this).attr("disabled", true);

                var this_id = $(this).attr("id"),
                    action = 'one_click_import';

                switch (this_id) {
                    case "blue":
                        action = "one_click_import_blue";
                        break;
                    default:
                        action = "one_click_import";
                        break;
                }

                var data = {
                    'action': action
                };

                $.post(
                    ajaxurl,
                    data,
                    function(response) {
                        $('.import_message').html('<div class="import_message_success">'+ response +'</div>');
                        $('.loading_wrap').hide();
                        //alert('Got this from the server: ' + response);
                    }
                );
            });
    })(jQuery);
</script>
<?php }?>
