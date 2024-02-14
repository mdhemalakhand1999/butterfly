<?php
/**
 * Class Cron Schedule
 * In Cron_Schedule, we will create our own cron intervals for WP Cron. Like weekly, Monthly, yearly, or 1 time for each 2 month ( whatever we want )
 * 
 * @since 1.0.0
 * 
 * @see https://developer.wordpress.org/plugins/cron/understanding-wp-cron-scheduling/
 */

 class Cron_Schedule {
    private static $_instance = null;
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Cron_Schedule class
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
     * Create constructor for Cron_Schedule class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_filter( 'cron_schedules', array( $this, 'butterfly_cron_schedule' ) );
    }
    /**
     * Butterfly cron schedule
     * 
     * Using cron schedule interval, we can create our custom schedule intervals
     * 
     * @since 1.0.0
     * 
     * @param array $schedules Here, have all list of schedule. We will modify this array and insert our custom schedule with interval and display parameter.
     * 
     * @return array $schedules This is the final array after our movified version.
     */
    public function butterfly_cron_schedule( $schedules ) {
        $schedules['weekly'] = [
            'interval' => 60400,
            'display'  => __('Once a week', 'butterfly-cron')
        ];
        return $schedules;
    }
 }