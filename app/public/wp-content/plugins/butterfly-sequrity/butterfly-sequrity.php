<?php
/**
 * @package Butterfly Sequrity
 */
/*
    Plugin Name: Butterfly Sequrity
    Plugin URI: https://www.butterfly.com
    Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
    Version: 1.0.0
    Requires at least: 5.8
    Requires PHP: 5.6.20
    Author: Butterfly All right reserved.
    Author URI: https://www.butterfly.com
    License: GPLv2 or later
    Text Domain: butterfly-sequrity
*/
if(!defined('ABSPATH'))  exit;

/**
 * Include require files
 */
include __DIR__. '/includes/class-custom-menu.php';
include __DIR__. '/includes/class-admin-menu.php';

/**
 * Create object for class
 */
$custom_menu = new Custom_Menu();
$admin_menu = new Admin_Menu();