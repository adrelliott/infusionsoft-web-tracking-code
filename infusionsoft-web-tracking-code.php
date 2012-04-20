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

function inf_web_tracking_settings_page() { ?>
	<div class="wrap">
		<h2>Infusionsoft® Web Tracking Code Settings</h2>
		<form method="post" action="options.php">
			<?php settings_fields('inf-web-tracking'); ?>
			<?php do_settings_sections('inf-web-tracking'); ?>
			<p>You can find your Web Tracking Code inside your Infusionsoft Application under <strong>Marketing</strong> &gt; <strong>Web Analytics</strong> &gt; <strong>Get Tracking Code</strong>.</p>
			<img src="<?php echo plugin_dir_url(__FILE__)."/web-tracking-code-example.png"; ?>" alt="" />
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Infusionsoft App Name:</th>
					<td><input type="text" name="inf-web-tracking-appname" value="<?php echo get_option('inf-web-tracking-appname'); ?>" />.infusionsoft.com</td>
				</tr>
				<tr valign="top">
					<th scope="row">Web Tracking Code:</th>
					<td><input type="text" name="inf-web-tracking-code" value="<?php echo get_option('inf-web-tracking-code'); ?>" style="width: 300px;" /></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<? }

function inf_web_tracking_code() {	
	if(!is_user_logged_in()) {
		$appname = get_option('inf-web-tracking-appname');
		$code = get_option('inf-web-tracking-code');
	
		if($appname && $code) { ?>
			<script type="text/javascript" src="https://<?php echo $appname; ?>.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=<?php echo $code ?>"></script>
		<?php }
	}
}

function inf_web_tracking_settings() {
	register_setting('inf-web-tracking', 'inf-web-tracking-appname');
	register_setting('inf-web-tracking', 'inf-web-tracking-code');
}

if(is_admin()) {
	add_action('admin_menu', 'inf_web_tracking_menu');
	add_action('admin_init', 'inf_web_tracking_settings');
} else {
	add_action('wp_footer', 'inf_web_tracking_code');
}

?>
