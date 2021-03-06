<?php
/**
 * Edit the social profiles available.
 *
 * @param  array $profiles The current array of registered social profiles.
 * @return array           The modified array of registered social profiles.
 */
function hd_test_edit_social_profile( $profiles ) {

	// if we have a linkedin profile.
	if ( ! empty( $profiles['linkedin'] ) ) {

		// remove it.
		unset( $profiles['linkedin'] );
	}

	// add the twitter profile.
	$profiles['pinterest'] = array(
		'id'                => 'hd_espw_pinterest_url',
		'label'             => __( 'Pinterest URL', 'hd-extensible-social-profiles-widget' ),
		'class'             => 'pinterest',
		'description'       => __( 'Enter your Pinterest profile URL', 'hd-extensible-social-profiles-widget' ),
		'priority'          => 50,
		'type'              => 'text',
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	);

	// return profiles;
	return $profiles;

}

add_filter( 'hd_espw_social_profiles', 'hd_test_edit_social_profile', 20, 1 );

/**
 * Removes the built in title output.
 */
function hd_test_remove_social_profiles_title() {

	// remove the title output action from the plugin.
	remove_action( 'hd_espw_social_icons_widget_output', 'hd_espw_social_icons_output_widget_title', 10, 2 );

}

add_action( 'init', 'hd_test_remove_social_profiles_title' );

/**
 * Add a custom title to the social profiles widget.
 *
 * @param  array $args     The widget args.
 * @param  array $instance The widget instance.
 */
function hd_test_add_custom_title( $args, $instance ) {

	echo '<h2>The Title: ' . esc_html( $instance['title'] ) . '</h2>';

}

add_action( 'hd_espw_social_icons_widget_output', 'hd_test_add_custom_title', 10, 2 );