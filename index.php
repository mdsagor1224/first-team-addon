<?php

/**
 * Plugin Name: Elementor Team Widget
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Sagor_WP
 * Author URI:  https://developers.elementor.com/
 * Text Domain: team-widget
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Register Team Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_team_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/team-widgets.php' );

	$widgets_manager->register( new \Elementor_Team_Widget() );

}
add_action( 'elementor/widgets/register', 'register_team_widget' );