<?php
/**
 * @package butterfly
 */
/*
Plugin Name: Butterfly Ajax Plugin
Plugin URI: butterfly.com
Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
Version: 1.0.0
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Automattic - Anti-spam Team
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: butterfly-ajax
*/

/**
 * Define all required constants for butterfly-ajax plugin
 * 
 * @since 1.0.0
 * @return void
 */
define('BUTTERFLY_AJAX_ROOT_PATH', plugin_dir_url( __FILE__ ));
/**
 * Include our require files
 * 
 * @since 1.0.0
 * @return void
 */
include __DIR__. '/includes/assets.php';
include __DIR__. '/includes/database.php';
include __DIR__. '/includes/classes/class-wp-ajax.php';

/**
 * Register all required class for Buttefly Ajax plugin
 * 
 * @since 1.0.0
 */
$assets = new Butterfly_Ajax\Assets();
$database = new Butterfly_Ajax\Database();
$wp_ajax = new Butterfly_Ajax\Classes\Class_WP_Ajax();