<?php

/**
* Plugin Name: saron wordpress Plugin 
* Plugin URI: http://saronplugin.com
* Description: This is a demo plugin developed assignment purpose 
*/
// Remove the admin bar from the front end
add_filter( 'show_admin_bar', '__return_false' );



if ( ! defined( 'ABSPATH' ) ) {
	die( 'Hey , you can not access  this file silly human ' );
}

// other way 
// defined( 'ABSPATH' ) or 	die( 'Hey , you can not access  this file dud ' );

//other way ...
// if (function_exists('add_action')){ echo "You can not access this file";}

// The Plugin class 
class DemoPlugin{

    function activate()
    {
    // Register custom PT
    // Flush 
    }
    
    function deactivate()
    {
    // Flush 
    }
    
    function uninstall()
    {
    //delete CP , delete tables on DB
    }

     

 



}
if(class_exists('DemoPlugin'))
{
    $demoplugin = new DemoPlugin();
}

// Registering Activation 
register_activation_hook(__FILE__, array( $demoplugin,'activate'));

// Registering De Activation 
register_deactivation_hook(__FILE__, array( $demoplugin,'deactivate'));

function dp_add_form(){
    require_once plugin_dir_path(__FILE__)."setting/contact.php";
}

add_shortcode("form_1", "dp_add_form");





















?>s