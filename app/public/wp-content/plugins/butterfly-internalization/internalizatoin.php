<?php
/**
 * @package Butterfly Internalization
 */
/*
    Plugin Name: Butterfly Internalization
    Plugin URI: https://www.butterfly.com
    Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
    Version: 1.0.0
    Requires at least: 5.8
    Requires PHP: 5.6.20
    Author: Butterfly All right reserved.
    Author URI: https://www.butterfly.com
    License: GPLv2 or later
    Text Domain: butterfly-internalization
*/
if(!defined('ABSPATH'))  exit;
require_once __DIR__. '/vendor/autoload.php';
/**
 * Define all required constants for butterfly-internalization plugin
 * 
 * @since 1.0.0
 * @return void
 */
define('BUTTERFLY_INTERNALIZATION_ROOT_PATH', plugin_dir_url( __FILE__ ));