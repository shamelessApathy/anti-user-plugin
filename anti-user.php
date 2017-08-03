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

class AntiUser {


public function __construct()
{

	function first_hook()
	{
		// This is where we intercept the registration of a new user, if au_register switch is turned ON, we block creation
		add_action('register_post', 'prevent_registration', 10, 3 );
		function prevent_registration($sanitized_user_login, $user_email, $errors)
		{
			if (get_option('au_register_switch') === '1')
			{
				$errors->add('demo_error', "<strong>ERROR</strong>:This site does not accept new users");
			}
		}
	}
	add_action('wp_loaded', 'first_hook');


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
	if (isset($_POST['au_register_switch']))
	{
		update_option('au_register_switch', $_POST['au_register_switch']);
	}
	$template_url = plugin_dir_url(__FILE__) . "templates";
	require_once("templates/au_admin_menu.php");
}
}


}
$anti = new AntiUser();








