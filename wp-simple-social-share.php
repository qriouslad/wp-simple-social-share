<?php
/*
Plugin Name: WP Simple Social Share
Plugin URI:  https://github.com/qriouslad/wp-simple-social-share
Description: Simple social media sharing plugin for WordPress
Version:     1.0
Author:      Bowo
Author URI:  https://bowo.io
Text Domain: wpscf
Domain Path: /languages
License:     GPL2
 
WP Simple Social Share is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WP Simple Social Share is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

/**
 * Add menu iterm for the plugin
 *
 */
function wpsss_menu_item() {
	add_submenu_page('options-general.php', 'Social Share', 'Social Share', 'manage_options', 'wpsss', 'wpsss_page');
}


add_action('admin_menu', 'wpsss_menu_item');


/**
 * Create options page
 *
 */
function wpsss_page() {
	?>
		<div class="wrap">
			<h1>Social Sharing Options</h1>

			<form method="post" action="options.php">
				<?php

					settings_fields('wpsss_config_section');

					do_settings_sections('wpsss');

					submit_button();

				?>
			</form>
		</div>
	<?php
}


/**
 * Define and display the option fields
 * 
 */
function wpsss_settings() {

	add_settings_section('wpsss_config_section', '', null, 'wpsss');

	add_settings_field('wpsss-facebook', 'Do you want to display Facebook share button?', 'wpsss_facebook_checkbox', 'wpsss', 'wpsss_config_section');
	add_settings_field('wpsss-twitter', 'Do you want to display Twitter share button?', 'wpsss_twitter_checkbox', 'wpsss', 'wpsss_config_section');
	add_settings_field('wpsss-linkedin', 'Do you want to display LinkedIn share button?', 'wpsss_linkedin_checkbox', 'wpsss', 'wpsss_config_section');
	add_settings_field('wpsss-reddit', 'Do you want to display Reddit share button?', 'wpsss_reddit_checkbox', 'wpsss', 'wpsss_config_section');

	register_setting('wpsss_config_section', 'wpsss-facebook');
	register_setting('wpsss_config_section', 'wpsss-twitter');
	register_setting('wpsss_config_section', 'wpsss-linkedin');
	register_setting('wpsss_config_section', 'wpsss-reddit');

}

function wpsss_facebook_checkbox() {
	?>
		<input type="checkbox" name="wpsss-facebook" value="1" <?php checked(1, get_option('wpsss-facebook'), true); ?> />
	<?php
}

function wpsss_twitter_checkbox() {
	?>
		<input type="checkbox" name="wpsss-twitter" value="1" <?php checked(1, get_option('wpsss-twitter'), true); ?> />
	<?php
}

function wpsss_linkedin_checkbox() {
	?>
		<input type="checkbox" name="wpsss-linkedin" value="1" <?php checked(1, get_option('wpsss-linkedin'), true); ?> />
	<?php
}

function wpsss_reddit_checkbox() {
	?>
		<input type="checkbox" name="wpsss-reddit" value="1" <?php checked(1, get_option('wpsss-reddit'), true); ?> />
	<?php
}

add_action('admin_init', 'wpsss_settings');