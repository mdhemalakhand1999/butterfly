<?php
/**
 * Create a class for add menu items on admin menu
 */
class Admin_Menu {
    protected $_instance = null;
    /**
     * Create a constructor for Admin_Menu class
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function __construct() {
        add_action('wp_before_admin_bar_render', [$this, 'butterfly_sequrity_add_menu_item_on_admin_bar']);
    }
    /**
     * Create an instance for create self object
     * 
     * This will help to access Admin_Menu class functions/methods
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
     * Add menu item on admin bar
     * 
     * If current user can edit_user, then only user can add menu item on users.php
     * 
     * @global $wp_admin_bar
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_sequrity_add_menu_item_on_admin_bar() {
        global $wp_admin_bar;
        if(current_user_can( 'edit_users' )) {
            $wp_admin_bar->add_menu([
                'id'    => 'butterfly-sequrity-users',
                'title' => __('Butterfly Sequrity Users'),
                'href'  => esc_url(admin_url('users.php'))
            ]);
        }
    }
}