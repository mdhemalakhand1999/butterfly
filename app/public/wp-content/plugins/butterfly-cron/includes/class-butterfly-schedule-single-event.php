<?php
/**
 * Schedule single event 
 * 
 * A class for schedule a single event
 * 
 * @since 1.0.0
 */
class Schedule_Single_Event {
    private $_instance = null;
    /**
     * Butterfly single event constructor are here
     * 
     * In constructor, we've added all action hooks and methods.
     * 
     * @since 1.0.0
     */
    public function __construct() {
        register_activation_hook( __FILE__, [$this, 'schedule_sinlgle_event'] );
        add_action('butterfly_single_event_hook', [$this, 'butterfly_send_email']);
    }
    /**
     * Schedule a single event
     * 
     * Basically single event will automatically removed after first time run. ( this schedule works only one time )
     * 
     * @param array $args in $args variable we will store all email list.
     * 
     * @since 1.0.0
     */

     public function schedule_sinlgle_event() {
        $args = [
            'hemalrika@gmail.com'
        ];
        // schedule a single event
        if( !wp_next_scheduled( 'butterfly_single_event_hook', $args ) ) {
            wp_schedule_single_event( time()+3600, 'butterfly_single_event_hook', $args );
        }
     }
     public function butterfly_send_email($email) {
        wp_mail( sanitize_email( $email ), __('Send a email subject', 'butterfly-cron'), __('Send email message', 'butterfly-cron') );
     }
}