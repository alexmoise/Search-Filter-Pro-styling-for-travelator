<?php
/**
 * Plugin Name: Search & Filter Pro styling for Travelator
 * Plugin URI: https://gist.github.com/alexmoise/60c195e51c7fa05e9ca07c74b7c36542
 * GitHub Plugin URI: https://gist.github.com/alexmoise/60c195e51c7fa05e9ca07c74b7c36542
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
	$sfpro_fields_active = (array_keys($_GET));
	$sfpro_fields_active_count = count($sfpro_fields_active);
	$sfpro_fields_active_comma = 0;
	foreach ($sfpro_fields_active as &$value) {
		$sfpro_fields_active_comma ++;
		$sfpro_fields_active_css .= 'select.sf-input-select[name="' . $value . '[]"]';
		if ( $sfpro_fields_active_comma < $sfpro_fields_active_count) {
			$sfpro_fields_active_css .= ', ';
		}
	}
	unset($value, $sfpro_fields_active_comma);
	// Adding dynamic styles
	$sfpro_extra_styles = $sfpro_fields_active_css . '
		{
		  background-color: yellow;
		}
	';
	wp_add_inline_style( 'sfpro_extra_styles', $sfpro_extra_styles );
}
 
?>