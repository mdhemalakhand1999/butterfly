<?php
namespace Butterfly_Ajax;
/**
 * Initialize a class for assets
 * 
 * It will enqueue/dequeue required file
 * 
 * @since 1.0.0
 * @return void
 */
class Assets {
    protected $_instance = null;
    /**
     * Create an instance for create self object
     * 
     * This will help to access Assets class functions/methods
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
     * Create a constructor of Assets class for declare hooks and methods
     * 
     * For admin area.
     * 
     * @since 1.0.0
     * @return null
     */
    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'load_plugin_scripts']);
        add_action('admin_enqueue_scripts', [$this, 'pass_plugin_data_to_js']);

    }
    /**
     * Enqueue required js and css files in load_plugin_scripts function
     * 
     * @since 1.0.0
     * @return null
     */
    public function load_plugin_scripts() {
        wp_enqueue_script(
            'butterfly-js', //handle
            BUTTERFLY_AJAX_ROOT_PATH. 'assets/js/scripts.js', //file path
            array('jquery'), //dependency
            time(), //version
            true
        );
    }
    /**
     * A function for pass data to javascript
     * 
     * @since 1.0.0
     * @var ajax_info
     * @param array(ajax_url, nonce)
     * @nonce butterfly-wp
     */
    public function pass_plugin_data_to_js() {
        wp_localize_script(
            'butterfly-js', //handle
            'bwp_obj', //object
            array(
                'ajax_url' => admin_url('admin-ajax.php'), //variable ajax_url and data is admin-ajax.php file path
                'nonce' => wp_create_nonce( 'butterfly-wp' )
            )
        );
    }
}