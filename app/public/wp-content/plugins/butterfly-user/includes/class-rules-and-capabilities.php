<?php
/**
 * Create a class for manage custom or default rules and capabilities
 * 
 * @package Butterfly User
 * 
 * @since 1.0.0
 */
/**
 * Some Information
 * 
 * Default Rules
 * Administrator, Editor, Author, Contributor, Subscriber
 */
class Butterfly_Rules_And_Capabilities {
    private static $_instance;
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Butterfly_Rules_And_Capabilities class
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
     * Create constructor for Butterfly_Rules_And_Capabilities class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_action('init', [$this, 'check_user_cap']);
        add_action('init', [$this, 'create_custom_role']);
        add_action('init', [$this, 'delete_a_role']);
        add_action('init', [$this, 'add_custom_cap_to_role']);
        add_action('init', [$this, 'remove_custom_cap_to_role']);
    }
    // check user capabilities
    public function check_user_cap() {
        if( current_user_can( 'edit_post', $post_id ) ) {
            // do whatever you want.
        }
        $user_id = 1234;
        $post_id = 9999;
        $blog_id = 5555;
        // check if user can do something
        if( user_can( $user_id, 'manage_options' ) ) {
            // do womething
        }
        // check if current user can do something
        if( current_user_can( 'edit_post' ) ) {
            // do something
        }
        // check if author can publish post
        if( author_can( $post_id, 'publish_posts' ) ) {
            // do something
        }
        // check if current user can edit theme option for blog
        if( current_user_can_for_blog( $blog_id, 'edit_theme_options' ) ) {
            // Execute code if current user can edit theme options for blog.
        }
        // check if user admin()
        if( !is_user_admin( 100 ) ) {
            echo 'You are not admin';
        }
    }
    /**
     * Create custom role in WordPress
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function create_custom_role() {
        // add_role( string $role, string $display_name, array $capabilities = [] );
        add_role(
            'form_administrator',
            __('Form Administrator', 'butterfly-user'),
            array(
                'read' => true,
                'create-forms' => true,
                'create_threads' => true,
                'moderate_forums' => true
            )
        );
    }
    /**
     * Delete a role in WordPress
     */
    public function delete_a_role() {
        remove_role( 'form_administrator' ); //role
    }
    /**
     * Add custom capability in a role
     * 
     * @since 1.0.0
     * 
     * @param array $role this will return role objects.
     * 
     * @return void
     */
    public function add_custom_cap_to_role() {
        // get role
        $role = get_role( 'form_administrator' );
        if( null !== $role ) {
            // add capability
            $role->add_cap('publish_posts', true);
        }
    }
    /**
     * Remove custom cap role
     */
    public function remove_custom_cap_to_role() {
        $role = get_role('form_administrator');
        if( null !== $role ) {
            $role->remove_cap( 'publish_posts' );
        }
    }
}