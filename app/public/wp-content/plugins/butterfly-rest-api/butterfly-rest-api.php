<?php
/**
 * @package Butterfly Rest API
 */
/*
Plugin Name: Butterfly Rest API Plugin
Plugin URI: butterfly.com
Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
Version: 1.0.0
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Butterfly
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: butterfly-rest-api
*/
include __DIR__. '/includes/register-rest-api.php';

new Register_Rest_API();