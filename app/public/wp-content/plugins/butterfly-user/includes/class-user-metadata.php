<?php
/**
 * Create a class which will works with user metadata
 * 
 * @package Butterfly User
 */
class Butterfly_User_Metadata {
    private static $_instance;
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Butterfly_User_Metadata class
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
     * Create constructor for Butterfly_User_Metadata class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_action('init', [$this, 'butterfly_add_user_meta']);
        add_action('init', [$this, 'butterfly_get_user_meta']);
        add_action('init', [$this, 'butterfly_update_user_meta']);
        add_action('init', [$this, 'butterfly_delete_user_meta']);
    }
    /**
     * Add a user meta
     * 
     * @since 1.0.0
     * 
     * @param array $args Here we will provide user ID, meta_key, meta value
     * 
     * @return void
     */
    public function butterfly_add_user_meta() {
        $args = array(
            100, //user id
            'favourite_book', //meta key
            __('WordPress Plugin Development', 'butterfly-user'), //meta value
            false, //is unique
        );
        add_user_meta( $args );
    }
    /**
     * get a user meta
     * 
     * @since 1.0.0
     * 
     * @param array user_book This will retrive user favourite book information
     * 
     * @return void
     */
    public function butterfly_get_user_meta() {
        $user_book = get_user_meta( 
            100, //user_id
            'favourite_book', //key
            true //is_single
         );
         if($user_book) {
            // do whatever you want.
         }
    }
    /**
     * Update a user meta
     * 
     * @since 1.0.0
     * 
     * @param array $args Here we will provide user_id, meta_key, meta_vaue, previous_meta_value
     * 
     * @return void
     */
    public function butterfly_update_user_meta() {
        $args = array(
            100, //user_id: integer
            'favourite_book', //meta_key: string
            __('Javascript, The Complete Reffrence', 'butterfly-user'), //meta value: mixed
            __('WordPress Plugin Development', 'butterfly-user'), //previous value: mixed | not required
        );
        update_user_meta( $args );
    }
    /**
     * Delete a user meta
     * 
     * @since 1.0.0
     * 
     * @param array $args For provide essential user data
     * 
     * @return void
     */
    public function butterfly_delete_user_meta() {
        $args = array(
            100, //user_id: integer
            'favourite_book', //meta_key: string
            __('Javascript, The Complete Reffrence', 'butterfly-user'), //meta_value:mixed
        );
        delete_user_meta( $args );
    }
}