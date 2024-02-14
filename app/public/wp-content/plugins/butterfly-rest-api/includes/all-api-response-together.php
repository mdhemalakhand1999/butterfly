<?php
/**
 * Here we will bring all api response together
 * 
 * @package Butterfly Rest API
 * 
 * @since 1.0.0
 */

 class Butterfly_All_API_Response_Together {
    private static $_instance;  
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Butterfly_All_API_Response_Together class
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
     * Create constructor for Butterfly_All_API_Response_Together class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_action( 'init', 'butterfly_create_post_using_rest_api' );
        add_action( 'init', 'butterfly_update_post_using_rest_api' );
        add_action( 'init', 'butterfly_delete_post_using_rest_api' );
    }
    /**
     * Create a post using rest api
     * 
     * @since 1.0.0
     * 
     * @param array $api_header_args Its for authentication using header arguments
     * 
     * @param array $api_body_args Our all essential body content has stored here
     * 
     * @param array $api_response this will store response of api
     * 
     * @function wp_remote_retrieve_response_message() used for retrive response message ( created / failed )
     * 
     * @param $body This will decode api body response and store
     * 
     * @return void
     */
    public function butterfly_create_post_using_rest_api() {
        // API URL
        $api_url = 'http://example.com/wp-json/wp/v2/posts';
        // set header arguments for authentication
        $api_header_args = array(
            'Authorization' => 'Basic '. base64_encode( 'brand:password' ) // encode your password to base64
        );
        // set body content
        $api_body_args = array(
            'title'   => __('Butterfly Test Post', 'butterfly-rest-api'),
            'status'  => 'draft',
            'content' => __('This is the content of butterfly test post. This can be much longer', 'butterfly-rest-api'),
            'excerpt' => __('This is excerpt of butterfly test post', 'butterfly-rest-api')
        );
        // send requst to remote post REST API
        $api_response = wp_remote_post( $api_url, array(
            'headers' => $api_header_args,
            'body'    => $api_body_args
        ) );

        // decode body response
        $body = json_decode( $api_response['body'] );
        // verify if response message was 'created'
        if( wp_remote_retrieve_response_message( $api_response ) === 'Created' ) {
            echo "$body->title Has been created";
        } else {
            new WP_Error( 'error-create-post', __('Sorry! Your post creation failed'), array( 'error_code' => 404 ) );
        }
    }
    /**
     * Update a post using REST API
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_update_post_using_rest_api() {
        // API URL
        $api_url = 'http://example.com/wp-json/wp/v2/posts';
        // set header arguments for authentication
        $api_header_args = array(
            'Authorization' => 'Basic '. base64_encode( 'brand:password' ) // encode your password to base64
        );
        // Create a post data array to update
        $api_body_args = array(
            'title' => __('Butterfly Old Post Updated', 'butterfly-rest-api'),
            'description' => __('Butterfly Old Post Description Updated')
        );
        // send request to remote post REST API
        $api_response = wp_remote_post( $api_url, array(
            'headers' => $api_header_args,
            'body'    => $api_body_args
        ) );
        // decode body resposne
        $body = json_decode( $api_response['body'] );
        // check if response message was 'Created'
        if( wp_remote_retrieve_response_message($api_response) === 'OK' ) {
            echo "YOur $body->title has been updated Successfully";
        } else {
            new WP_Error('udpate-error', __('Sorry! Your post not updated successfully', array(
                'error_code' => 400
            )));
        }
    }
    /**
     * Delete a post using rest API
     * 
     * @since 1.0.0
     * 
     * @param string $api_url url for rest api
     * 
     * @param string $api_header_args retrive api header arguments
     * 
     * @return void
     */
    public function butterfly_delete_post_using_rest_api() {
        // api url
        $api_url = 'http://example.com/wp-json/wp/v2/posts/<ID>';
        // api header arguments
        $api_header_args = array(
            'Authentication' => 'Basic '. base64_encode('brand:password')
        );
        // create a delete remote REST API request
        $api_response = wp_remote_post( $api_url, array(
            'method' => 'DELETE',
            'headers' => $api_header_args
        ) );
        // decode response body
        $body = json_decode( $api_response );
        // check if removed successfully
        if( wp_remote_retrieve_response_message($api_response) == 'OK' ) {
            echo "Your $body->title->rendered  has been removed";
        } else {
            new WP_Error( 'post-remove', __('Your post removed failed', 'butterfly-rest-api'), array(
                'error_code' => 500
            ) );
        }
    }
 }