<?php
/*
Plugin Name: Anti-User
Plugin URI:  NONE
Description: Basic WordPress Plugin Header Comment
Version:     20160911
Author:      shamelessApathy
Author URI:  NONE
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages
*/

defined('ABSPATH') or die(' No script kiddies please! ');

/* Potentially need Activation Hook Here */
# register_activation_hook( __FILE__, 'pluginprefix_function_to_run');


/* Deactivation Hook */
# register+deactivation_hook( __FILE__, 'pluginprefix_function_to_run');

/* Adding a Top-Level Admin Menu */






/* Registering the Anti-User menu inside of the admin_menu hook */
add_action('admin_menu', 'anti_user_menu');
/* Here we define everything for the menu */
function anti_user_menu() 
{
	$page_title = "Anti-User Options";
	$menu_title = "Anti-User";
	$capability = "administrator";
	$menu_slug = "anti-user";
	$icon_url = plugin_dir_url(__FILE__) . 'images/hallows.png';
	add_menu_page(
		$page_title,
		$menu_title,
		$capability,
		$menu_slug,
		'anti_user_options_page',
		$icon_url,
		$position = null
		);
}

/* Adding Enable/Disable User creation option Default is 0 = OFF*/
add_option('au_register_switch', 0);
/**
* This function renders the admin options area
* @param none
* @return PHP/HTML Template
*/
function anti_user_options_page()
{
	$current_value = get_option('au_register_switch');
	$template_url = plugin_dir_url(__FILE__) . "templates";
	require_once("templates/au_admin_menu.php");
}

/* Register Settings */
add_action('admin_init','register_my_settings');
function register_my_settings()
{
	add_settings_section(
	'anti-user-settings',
	'Section for Switch On/Off',
	'au_setting_section_callback_function',
	'anti-user'
	);
	// Register a callback
	register_setting('anti-user-settings-switch','au_register_switch', 'intval');
	add_settings_field(
		'au_register_switch_tag_id', // id
		'Title for On/Off', // title
		'au_register_switch_show_settings',
		'anti-user'
		/* These are optional below */
		//'au_register_switch_id',
		//array('label_for'=> 'au_register_switch_id')
		);
	function au_register_switch_show_settings( $args )
	{
		echo 'getting there';
		/*$data = esc_attr(get_option('au_register_switch'));
		printf(
			"<input type='text' name='au_register_switch' value='%1$s' id='%2$s'/>",
			$data,
			$args['label_for']
			);*/
	}
}






?>