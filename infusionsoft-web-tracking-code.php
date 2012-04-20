<?php
/*
Plugin Name: Infusionsoft® Web Tracking Code
Description: This plugin provides a simple method for Infusionsoft® users to add the Spring Release's new Web Analytics tracking code to their WordPress-powered site.
Author: Mediajitsu, LLC
Version: 1.0
Author URI: http://mediajitsu.com/
*/

function inf_web_tracking_menu() {
	add_menu_page('Infusionsoft Web Tracking', 'Infusionsoft Web Tracking', 'administrator', __FILE__, 'inf_web_tracking_settings_page');
}

function inf_web_tracking_settings_page() {
}

function inf_web_tracking_code() {	
}

function inf_web_tracking_settings() {
}

if(is_admin()) {
	add_action('admin_menu', 'inf_web_tracking_menu');
	add_action('admin_init', 'inf_web_tracking_settings');
} else {
	add_action('wp_footer', 'inf_web_tracking_code');
}

?>
