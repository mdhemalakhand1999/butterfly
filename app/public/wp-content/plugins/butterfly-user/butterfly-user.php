<?php
/**
 * @package Butterfly User
 */
/*
Plugin Name: Butterfly User Plugin
Plugin URI: butterfly.com
Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
Version: 1.0.0
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Automattic - Anti-spam Team
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: butterfly-user
*/


/**
 * Include require files
 */
include __DIR__. '/includes/class-basic-user-activities.php';

register_activation_hook( __FILE__, function() {
    new  Basic_User_Activities();
} );