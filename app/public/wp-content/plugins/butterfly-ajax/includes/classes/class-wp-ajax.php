<?php
namespace Butterfly_Ajax\Classes;
/**
 * Create a class for handle WP ajax request.
 * 
 * @since 1.0.0
 * @return void 
 */
class Class_WP_Ajax {
    /**
     * Create a instance variable for initialize self object
     * 
     * For future use from other class
     * 
     * @since 1.0.0
     * @param $instance
     * @default null
     * @return void
     */
    protected $_instance = null;
    /**
     * Create an instance for create self object
     * 
     * This will help to access Database class functions/methods
     * 
     * @since 1.0.0
     * @static
     * @param $_instance
     * @return static $_instance
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Create a constructor which will load when class initialized
     * 
     * Our required all action or function will initialize here
     * 
     * @since 1.0.0
     * @return void
     */
    public function __construct() {
        $this->register_ajax_actions();
    }
    /**
     * Register ajax actions for frontend and backend
     * 
     * @since 1.0.0
     * @return void
     */
    public function register_ajax_actions() {
        add_action('wp_ajax_send_form_data', array($this, 'wp_ajax_send_form_data_callback'));
    }
    /**
     * Create a ajax function for form data
     * 
     * @since 1.0.0
     */
    public function wp_ajax_send_form_data_callback() {

        /**
         * Check if nonce is not verified
         * 
         * then send a json error message
         * 
         * @return success or failed
         * @since 1.0.0
         */
        if(!isset($_POST['nonce'])) {
            wp_send_json_error(
                array(
                    'message' => 'Nonce is not valid'
                ),
            );
            die();
        }
        /**
         * Check if nonce is varified
         * 
         * @since 1.0.0
         * @checked true/false
         */
        if(wp_verify_nonce( $_POST['nonce'], 'butterfly-wp' )) {
            wp_send_json_success( 
                array(
                    'name' => __('Andraw', 'butterfly-ajax'), //username
                    'message' => __('Success!', 'butterfly-ajax') //message
                ),
                200, //json code
            );
        }
        die();
    }
}