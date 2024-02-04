<?php
/**
 * @package butterfly
 */
/*
Plugin Name: Butterfly WordPress Plugin
Plugin URI: butterfly.com
Description: Butterfly is an opensource project. Created by Nazrul Islam Nayan ( Mentor ) and MD Hemal Akhand
Version: 1.0.0
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Automattic - Anti-spam Team
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: butterfly
*/
/**
 * Without class hooks are included
 * 
 * @since 1.0.0
 * @return void
 */
include __DIR__. '/views/a-regular-hook-form.php';
include __DIR__. '/includes/hooks/hook-without-class.php';

/**
 * With class hooks are included
 */
include __DIR__. '/views/a-class-hook-form.php';
include __DIR__. '/includes/hooks/hook-with-class-add.php';
include __DIR__. '/includes/hooks/hook-with-class-remove.php';