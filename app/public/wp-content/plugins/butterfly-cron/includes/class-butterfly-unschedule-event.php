<?php
/**
 * Butterfly unschedule event
 * 
 * In Butterfly_Unschedule_Event class, we've unscheduled necessary events
 * 
 * 
 * @since 1.0.0
 */
class Butterfly_Unschedule_Event {
    private static $_instance = null;
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Butterfly_Unschedule_Event class
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
     * Create constructor for Butterfly_Unschedule_Event class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        // create a schedule when registered plugin
        register_activation_hook( __FILE__, array( $this, 'butterfly_schedule_an_event' ) );
        register_deactivation_hook( __FILE__, array( $this, 'butterfly_unschedule_an_event' ) );
        add_action('butterfly_schedule_an_wp_event', array( $this, 'butterfly_create_an_wp_event' ) );
    }
    /**
     * Create a event
     * 
     * Create a event which will schedule hourly
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/reference/functions/wp_schedule_event/
     */
    public function butterfly_schedule_an_event() {
        wp_schedule_event( time(), 'hourly', 'butterfly_schedule_an_wp_event' );
    }
    /**
     * Unschedule/Remove an event
     * 
     * Unschedule an event if event expires or already done.
     * 
     * @since 1.0.0
     * 
     * @param string timestamps Basically, timestamps will check, if wp_next_scheduled() already true/false
     * 
     * @see https://developer.wordpress.org/reference/functions/wp_unschedule_event/
     */
    public function butterfly_unschedule_an_event() {
        $timestamps = wp_next_scheduled( 'butterfly_schedule_an_wp_event');
        if($timestamps) {
            wp_unschedule_event( $timestamps, 'butterfly_schedule_an_wp_event' ); // $timestamps, $hook
        }
    }
    public function butterfly_create_an_wp_event() {
        // wp_mail( $to:string|array, $subject:string, $message:string, $headers:string|array, $attachments:string|array )
        wp_mail(
            sanitize_email( 'hemalrika@gmail.com' ),
            __('Create a meetup on wordpress in dhaka', 'butterfly-cron'),
            __('Hey! Lets create a meetup for WordPress Community in Dhaka/Bangladesh', 'butterfly-cron')
        );
    }
}