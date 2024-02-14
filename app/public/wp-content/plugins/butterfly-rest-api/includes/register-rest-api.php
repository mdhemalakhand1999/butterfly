<?php
/**
 * Register Rest API
 * 
 * Create a class which will register a rest api and return api response.
 * 
 * @package Butterfly Rest API
 * 
 * @since 1.0.0
 */

 class Register_Rest_API {
    private static $_instance;  
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Register_Rest_API class
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
     * Create constructor for Register_Rest_API class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_action('rest_api_init', [ $this, 'butterfly_get_students_data' ] );
    }
    /**
     * Create rest API
     * 
     * Create a rest api which will return a array of data in json format.
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_get_students_data() {
        // register_rest_route( $namespace:string, $route:string, $args:array, $override:boolean )
        register_rest_route( 'butterfly-rest-api/v1', '/author/(?P<id>\d+)', // namespace, route http://localhost:10004/wp-json/butterfly-rest-api/v1/author/<ID>
            array(
                'method' => 'GET',
                'callback' => [ $this, 'butterfly_rest_api_post_title_by_author_id' ]
            )
        );
    }
    /**
     * Return array of title by author ID
     * 
     * @since 1.0.0
     * 
     * @param array $data Options for the function.
     * 
     * @return string|null Post title for the latest, * or null if none.
     */
    public function butterfly_rest_api_post_title_by_author_id($data) {
        $posts = get_posts( array(
            'author' => absint( $data['id'] )
        ) );
        if( empty($posts) ) {
            return new WP_Error( 'no-author', __('Invalid Author', 'butterfly-rest-api'), array(
                'status' => 404
            ) ); // slug, content, $args
        }
        return $posts[0]->post_title;
    }
 }