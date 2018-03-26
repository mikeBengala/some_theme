<?php
function send_contact_form_email($phpmailer){
    $the_post = (object) $_POST;

    $data_recoil = array();
    foreach($the_post->the_message as $fieldArray){
        $line = array();
        foreach($fieldArray as $key => $value){
            array_push($line, $value);
        }
        array_push($data_recoil, implode(": ", $line));
    }
    $data_recoil = implode("; <br />", $data_recoil);
    $your_website = get_site_url();
    $to = get_theme_mod('contact_form_email_setting', "");
    $subject = 'Message from ' . $your_website;
    $body = "This email was submited at <a href='"    .    $your_website    .    "' target='_blank'>" . $your_website . "</a> by a user.<br /><br /><hr>" . $data_recoil . "<br /><hr>";
    $headers = array('Content-Type: text/html; charset=UTF-8');

    if($to != ""){
        $form_is_filled = true;
        $required_fields_array = explode(", ", $the_post->required_fields);
        foreach($required_fields_array as $fields){
            if($fields == "undefined"){
                $form_is_filled = false;
            }
        }

        if($form_is_filled == false){
            $response = array(
                "status" => "incomplete",
                "icon" => '<i class="error fa fa-exclamation-triangle" aria-hidden="true"></i>',
                "title" => __("Form Incomplete", "quiet_theme"),
                "message" => __("You must fill all required fields before sending the message"),
                "exit_button" => __("Continue Browsing")
            );
        }else{
            $sent = wp_mail($to, $subject, $body ,$headers);
            if($sent){
                $response = array(
                    "status" => "sent",
                    "icon" => '<i class="success fa fa-check" aria-hidden="true"></i>',
                    "title" => __("Success", "quiet_theme"),
                    "message" => __("Your message was sent successfully"),
                    "exit_button" => __("Continue Browsing")
                );
            }else{
                $response = array(
                    "status" => "error",
                    "icon" => '<i class="error fa fa-exclamation-triangle" aria-hidden="true"></i>',
                    "title" => __("Error", "quiet_theme"),
                    "message" => __("This contact form is currently not working, please contact us by phone or email."),
                    "exit_button" => __("Continue Browsing")
                );
                //$response = var_dump($sent);
            }

        }

    }else{
        if (user_can( wp_get_current_user(), 'administrator' )) {
            $response = array(
                "status" => "error",
                "icon" => '<i class="error fa fa-exclamation-triangle" aria-hidden="true"></i>',
                "title" => __("Error", "quiet_theme"),
                "message" => __("You must set a email recipient to make this form work. Click on Edit Contact Form"),
                "exit_button" => __("Continue Browsing")
            );
        }else{
            $response = array(
                "status" => "error",
                "icon" => '<i class="error fa fa-exclamation-triangle" aria-hidden="true"></i>',
                "title" => __("Error", "quiet_theme"),
                "message" => __("This contact form is currently not working, please contact us by phone or email."),
                "exit_button" => __("Continue Browsing")
            );
        }
    }
    echo json_encode($response);
     wp_die();
}
add_action( 'wp_ajax_send_contact_form_email', 'send_contact_form_email' );
add_action( 'wp_ajax_nopriv_send_contact_form_email', 'send_contact_form_email' );
?>
