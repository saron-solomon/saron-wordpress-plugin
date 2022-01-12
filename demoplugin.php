<?php

/**
* Plugin Name: saronwordpressPlugin 
* Plugin URI: http://saronwordpressplugin.com
* Description: This is a demo plugin developed assignment purpose 
*/
// Remove the admin bar from the front end
add_filter( 'show_admin_bar', '__return_false' );



if ( ! defined( 'ABSPATH' ) ) {
	die( ' you can not access  this file ' );
}
//define variable for path to this plugin file.

define{ 'HD_ESPW_LOCATION', dirname{__FILE__} };
define{ 'HD_ESPW_LOCATION_URL', plugin_url('',__FILE__))
// other way 
// defined( 'ABSPATH' ) or 	die( 'Hey , you can not access  this file dud ' );

//other way ...
// if (function_exists('add_action')){ echo "You can not access this file";}

//The Plugin class  that define get registeres social profile.
 *@return array an array of registered social profile
 *
 * //
 function hd_espw_get_social_profiles(){
     // return a filterable social profiles
    return apply_filters(
        'hd_espw_social_profiles',
        array()

    )

    }
    /**
     * register the default social frofile
     * 
     * @return array profile in array of the current registered social profiles
     * @return array the modified array of social media
     */
    function hd_espw_register_default_social_profiles($profiles){
        //add the facebook profile.
        $profiles['facebook']= array(
            'id'                => 'hd_espw_facebook_url',
            'label'             => _('Facebook URL','hd-extensible-socia-profile-widget')
            'class'             => 'facebook',
            'description'       => _('Enter your facebook profil URL','hd-extensible-social-profile-widget'),
            'priority'          => 10,
            'type'              => 'text',
            'default'           => '',
            'sanitize_callback' =>'sanitize_text_field',
        );
        //add the instagram profile
        $profiles['instagram']= array(
            'id'                => 'hd_espw_instagram_url',
            'label'             => _('Instagram URL','hd-extensible-socia-profile-widget')
            'class'             => 'instagram',
            'description'       => _('Enter your Instagram profil URL','hd-extensible-social-profile-widget'),
            'priority'          => 10,
            'type'              => 'text',
            'default'           => '',
            'sanitize_callback' =>'sanitize_text_field',
        );

        //add the linkedin profile
        $profiles['linkedin']= array(
            'id'                => 'hd_espw_linkedin_url',
            'label'             => _('Linkedin URL','hd-extensible-socia-profile-widget')
            'class'             => 'linkedin',
            'description'       => _('Enter your Linkedin profil URL','hd-extensible-social-profile-widget'),
            'priority'          => 10,
            'type'              => 'text',
            'default'           => '',
            'sanitize_callback' =>'sanitize_text_field',
        );
        //return the modified profiles
        return $profiles;

    }


    add_filter('hd_espw_social_profiles', 'hd_espw_register_default_social_profiles',)

/**
 * register the social media profile with the custumer in wordpress
 * 
 * @param wp_customizer  $wp_customize the customer object
 */
function hd_espw_theme_register_social_customer_setting($wp_customize){
    //get the social profile.
    $social_profiles = hd_espw_get_social_profiles();
    //if we have any social profiles
    if (! empty ($social_profiles)){

        //register the customer section for social profiles.
        $wp_customize->add_section(
            'hd_espw_social',
            array(
                'title'         =>_('social_profiles'),
                'description'   =>_('add social media profile here.'),
                'priority'      =>100,
                'capability'    =>'edit_theme_options',     
            )
            );
            //loop through each progite.
            foreach( $social_profiles as $social_profile){
                //add the customerize setting for this profile.
                $wp_customize->add_seeting(
                    $social_profile['id'],
                    array(
                        'default'            =>'',
                        'santize_callback'   =>$social_profile['sanitize_callback'],
                    )
                    );
                    //add the customer control for this profile
                    $social_profile['id'],
                    array(
                        'type'              => $social_profile['type'],
                        'priority'          => $social_profile['priority'],
                        'section'           => 'hd_espw_social',
                        'label'             => $social_profile['label'],




                    )





            }
    }
}







