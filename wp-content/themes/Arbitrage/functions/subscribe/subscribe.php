<?php 

// Lipode MailChimp Subscribe Widget

include("mc-api/src/Mailchimp.php");
include("subscribe-widget.php");
include("ajax-handler.php");

function mcsw_register_widget(){
    register_widget('Subscribe_Widget');
}

function mcsw_add_scripts(){
    wp_enqueue_script('mcsw', get_template_directory_uri() . '/functions/subscribe/mcsw.js', array('jquery'), '0.9', true);
}

function mcsw_nonce_action(){
    return 'mcsw_subscribe';
}

add_action('widgets_init', 'mcsw_register_widget');
add_action('wp_enqueue_scripts', 'mcsw_add_scripts');

?>