<?php
/**
 * Create a class which will create, read, update or delete user
 * 
 * @package Butterfly User
 * 
 * @since 1.0.0
 */
class Butterfly_Crud_User {
    private static $_instance;

    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Butterfly_Crud_User class
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
     * Create constructor for Butterfly_Crud_User class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_action( 'admin_init', [$this, 'butterfly_insert_user'] );
        add_action( 'admin_init', [$this, 'butterfly_create_user'] );
        add_action( 'admin_init', [$this, 'butterfly_update_user'] );
        add_action( 'admin_init', [$this, 'butterfly_delete_user'] );
        add_action( 'admin_init', [$this, 'butterfly_get_user_data'] );
        add_action( 'admin_init', [$this, 'butterfly_get_user_post_count'] );
    }
    /**
     * Insert an user
     * 
     * @param array $args We will define all essential information in an array which will be needed on wp_insert_user() function
     * 
     * @since 1.0.0
     */
    public function butterfly_insert_user() {
        // if hemalrika username exists, then we will return.
        if( username_exists( 'hemalrika' ) ) {
            return;
        }
        // insert user
        $args = array(
            'user_login'   => 'hemalrika',
            'user_email'   => 'hemalrika@gmail.com',
            'user_pass'    => 'hemalrikapass',
            'user_url'     => 'https: //www.hemalrika.com',
            'display_name' => _x( 'Hemal With Rika', 'This will display as name', 'butterfly-user' ),
            'role'         => 'editor',
            'description'  => 'Hemal with rika is a editor of WordPress Butterfly User plugin.'
        );
        $user = wp_insert_user( $args );

        if( is_wp_error( $user ) ) {
            $user->get_error_message();
        } else {
            echo 'User inserted Successfully!';
        }
    }
    /**
     * Create an user
     * 
     * @param array $args We will define all essential information in an array which will be needed on wp_create_user() function
     * 
     * @since 1.0.0
     */
    public function butterfly_create_user() {
        // if user exists, then return
        if( username_exists( 'hemalrika' ) ) {
            return;
        }
        $args = array(
            'hemalrika', //name
            'hemalrika_pass', //password
            'hemalrika@example.com' // email
        );
        // create user
        $user = wp_create_user( $args );
        // check if wasn't then display an error message
        if( is_wp_error( $user ) ) {
            echo $user->get_error_message();
        }
    }
    /**
     * Update an existing user
     * 
     * @param object $user Here we will get all current user values
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_update_user() {
        // get current user
        $user = get_current_user();
        // bail if current user has no object
        if( empty($user) ) {
            return;
        }
        // get color from user
        $color = get_user_meta( $user->ID, 'admin_color', true );
        if( 'fresh' !== $color ) {
            wp_update_user( array(
                'ID'          => $user->ID,
                'admin_color' => 'fresh'
            ) );
        }
    }
    /**
     * Delete an existing user
     * 
     * You must be carefull when delete an user. Also, by this, you can reassign all posts to other user
     * 
     * @since 1.0.0
     */
    public function butterfly_delete_user() {
        wp_delete_user( 100, 1 ); //user_id = 100; all_things will be assign into user of id 1

    }
    /**
     * Get user data
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_get_user_data() {
        $user = new WP_User( 1 ); // get user info where user_id = 1
        echo sanitize_email( $user->user_email ); //print user email
    }
    /**
     * Get user post count
     * 
     * @param array $user This will return an array with current user data
     * 
     * @param array $user_count this will return array of user_count
     * 
     * @return void
     */
    public function butterfly_get_user_post_count() {
        $user = get_current_user();
        // count multi user pos
        // $multi_user_count = count_many_users_posts( $users:array, $post_type:string|array, $public_only:boolean );
        $user_post_counts = count_user_posts( $user->ID, 'posts', false ); // ID, post_type, is_public_only
        if( 30 < $user_post_counts ) {
            update_user_meta( $user->ID, 'user_count_status', __( 'User Posts is less then 30', 'butterfly-user' ) );
        } else {
            update_usermeta( $user->ID, 'user_count_status', __( 'User posts is upper then 30', 'butterfly-user' ) );
        }
    }
}