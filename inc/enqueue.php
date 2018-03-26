<?php
function wpdocs_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/static/custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

// register the script and the style ------------------------->
function myscripts() {
	wp_enqueue_script('jquery');
	wp_register_script('quiet_script', get_template_directory_uri().'/static/script.js', 'jquery');
	wp_enqueue_script('quiet_script');
	wp_localize_script( 'quiet_script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_style( 'style', get_stylesheet_uri());
}
add_action("wp_enqueue_scripts", "myscripts");
// end register the script and the style --------------------->
?>
