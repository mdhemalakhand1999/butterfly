<?php
/**
 * Class for cron management
 * 
 * In this class, we've discuss about a full overview on cron management system.
 * 
 * @since 1.0.0
 * 
 * @return void
 */
class Butterfly_Cron {
    private $_instance = null;
    /**
     * Butterfly cron constructor are here
     * 
     * In constructor, we've added all action hooks and methods.
     * 
     * @since 1.0.0
     */
    public function __construct() {
        register_activation_hook( __FILE__, [$this, 'butterfly_create_cron_event'] );
        add_action( 'butterfly_hourly_email_hook', [$this, 'butterfly_send_email_func'] );
    }
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Butterfly_Cron class
     * 
     * @since 1.0.0
     * 
     * @param object $_instance Here, we've stored self class object. So that, we can access any function/method by using this object.
     * 
     * @return object
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /**
     * Create a cron event on activate
     * 
     * Here we've checked if already this event exists, using wp_next_scheduled() and then, created a cron event using wp_schedule_event($timestamp, $recurrence, $hook, $args)
     * 
     * @since 1.0.0
     * 
     * @param array $args
     * 
     * @return void
     */
    function butterfly_create_cron_event() {
        $args = [
            'hemalrika@gmail.com'
        ];
        // check if next schedule available
        if( !wp_next_scheduled( 'butterfly_hourly_email_hook', $args ) ) {
            wp_schedule_event( time(), 'hourly', 'butterfly_hourly_email_hook', $args );
        }
    }
    /**
     * Butterfly send email
     * 
     * Here we will send an email. Which will be execute on every 1 hour.
     * 
     * @param array $email
     * 
     * @function wp_mail()
     * 
     * @return void
     */

    public function butterfly_send_email_func($email) {
        wp_mail( sanitize_email( $email ), __('Reminder', 'butterfly-cron'), __('Hey Butterfly. Its a custom message from butterfly') );
    }
}