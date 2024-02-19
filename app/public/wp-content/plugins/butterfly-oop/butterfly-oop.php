<?php
/*
    Plugin Name: Butterfly OOP
    Plugin URI: https://www.butterfly.com
    Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
    Version: 1.0.0
    Requires at least: 5.8
    Requires PHP: 5.6.20
    Author: Butterfly All right reserved.
    Author URI: https://www.butterfly.com
    License: GPLv2 or later
    Text Domain: butterfly-oop
*/
if(!defined('ABSPATH'))  exit;

/**
 * Define all required constants for butterfly-oop plugin
 * 
 * @since 1.0.0
 * @return void
 */
define('BUTTERFLY_OOP_ROOT_PATH', plugin_dir_url( __FILE__ ));


/**
 * Include require files
 */
include __DIR__. '/includes/principals/method-chaining.php';
include __DIR__. '/includes/principals/dependency-injection.php';
