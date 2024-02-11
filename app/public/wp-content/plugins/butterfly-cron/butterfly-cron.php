<?php
/**
 * @package Butterfly Cron
 */
/*
Plugin Name: Butterfly Cron Plugin
Plugin URI: butterfly.com
Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
Version: 1.0.0
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Automattic - Anti-spam Team
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: butterfly-cron
*/



/**
 * Include require files
 */
include __DIR__. '/includes/class-butterfly-cron.php';
include __DIR__. '/includes/class-butterfly-schedule-single-event.php';

/**
 * Declare object as varaiable
 * 
 * @since 1.0.0
 */
$butterfly_cron = new Butterfly_Cron();
$schedule_single_event = new Schedule_Single_Event();