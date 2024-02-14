<?php
/**
 * Get data using WP Remote Function
 * 
 * @package Butterfly Rest API
 * 
 * @since 1.0.0
 */
class Get_Data_WP_Remote {
    private static $_instance;  
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Get_Data_WP_Remote class
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
     * Create constructor for Get_Data_WP_Remote class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_action('init', [ $this, 'butterfly_get_data_by_wp_remote' ]);
        add_action('init', [ $this, 'butterfly_wp_remote_companions' ]);
    }
    /**
     * Get data using wp_remote_*
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_get_data_by_wp_remote() {
        /**
         * @see https://developer.wordpress.org/reference/functions/wp_remote_get/
         * @see https://developer.wordpress.org/reference/functions/wp_remote_post/
         * @see https://developer.wordpress.org/reference/functions/wp_remote_head/
         * @see https://developer.wordpress.org/reference/functions/wp_remote_request/
         */
        $args = array(
            'method' => 'GET',
            'timeout' => 5,
            'redirection' => 5,
            'httpversion' => '1.0',
            'user-agent' => 'WordPress/5.3; https://example.com/',
            'reject_unsafe_urls' => $url,
            'blocking' => true,
            'headers' => array (),
            'cookies' => array (),
            'body' => NULL,
            'compress' => false,
            'decompress' => true,
            'sslverify' => true,
            'sslcertificates' => ABSPATH . WPINC . '/certificates/ca-bundle.crt',
            'stream' => false,
            'filename' => NULL,
            'limit_response_size' => NULL
        );
        // get data by wp_remote_get
        $get_results = wp_remote_get( $url, $args ); // $url:string, $args: array
        // get data by wp_remote_post
        $get_results = wp_remote_post( $url, $args ); // $url:string, $args: array
        // get data by wp_remote_head
        $get_results = wp_remote_head( $url, $args ); // $url:string, $args: array
        // get dat by wp_remote_request
        $get_results = wp_remote_request( $url, $args ); // $url: string, $args: array
        /**
         * For bad response
         */
        $bad_urls = array(
            'malformed',
            'irc://example.com/',
            'http://inexistant',
        );
        foreach( $bad_urls as $url ) {
            $response = wp_remote_head( $url, array(
                'timeout' => 1
            ) );
            if( is_wp_error( $response ) ) {
                $error = $response->get_error_message();
                echo "<p>Trying $url returned: <br/> $error";
            }
        }
        /**
         * All essential companions of wp_remote_* function
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        wp_remote_retrieve_response_code( $response ); // return response code | WP_Error
        wp_remote_retrieve_response_message( $response ); // return response message | WP_Error
        wp_remote_retrieve_body( $response ); // return response body | WP_Error
        wp_remote_retrieve_headers( $response ); // return response headers | WP_Error
        wp_remote_retrieve_header( $response, $header ); //Returns just one particular header from a server response
    }
}