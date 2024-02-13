<?php
/**
 * Create a class for insert or create a user
 * 
 * @package Butterfly User
 * 
 * @since 1.0.0
 */
class Basic_User_Activities {
    private static $_instance = null;
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Basic_User_Activities class
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
     * Create constructor for Basic_User_Activities class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        // check if user not logged in, then return
        if( !is_user_logged_in() ) {
            return;
        }
        add_action('init', [ $this, 'get_user_by_role'] );
        add_action('init', [ $this, 'count_users'] );
    }
    /**
     * Get user By Role
     * 
     * @package Butterfly User
     * 
     * @param array $args We will define our role here
     * 
     * @since 1.0.0
     */
    public function get_user_by_role() {
        // get all users
        $args = array(
            'role' => 'subscriber'
        );
        $subscribers = get_users($args);
        foreach($subscribers as $user) {
            // show user image
            echo get_avatar($user);
        }
    }
    /**
     * Get the user count
     * 
     * @package Butterfly User
     * 
     * @since 1.0.0
     */
    public function count_users() {
        $user_count_arr = count_users();
        // do whatever you want.
    }
}