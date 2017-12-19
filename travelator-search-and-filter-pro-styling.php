<?php
/**
 * Plugin Name: Search and Filter Pro styling for Travelator
 * Plugin URI: https://gist.github.com/alexmoise/
 * GitHub Plugin URI: https://gist.github.com/alexmoise/
 * Description: A custom plugin to add some highlighting styles for active filters of the Search and Filter Pro Wordpress plugin used on Travelator.ro
 * Version: 1.0.0
 * Author: Alex Moise
 * Author URI: https://moise.pro
 */
 
 if ( ! defined( 'ABSPATH' ) ) { exit(0);}
 
// Enqueue the styles
add_action( 'wp_enqueue_scripts', 'travelator_sfpro_extra_styles', 99 );
function travelator_sfpro_extra_styles() {
 
 // Add CSS file
 wp_enqueue_style( 'sfpro_extra_styles', plugins_url( 'sfpro_extra_static.css', __FILE__ ) );
 
	// GET checkings here
	
	// Adding dynamic styles
	$sfpro_extra_styles = "
		.class {color:yellow;}
	";
	wp_add_inline_style( 'sfpro_extra_styles', $sfpro_extra_styles );
}
 
?>