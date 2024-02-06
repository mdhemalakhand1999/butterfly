<?php
namespace Butterfly_Ajax;
/**
 * A class for create custom menu
 * 
 * Here it will create all of required menu for butterfly ajax plugin
 */
class Database {
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
    $this->init_hooks();
  }
  /**
   * Initialize all required hooks for database Class
   * 
   * @since 1.0.0
   * @return void
   */
  public function init_hooks() {
    add_action('admin_menu', array($this, 'create_butterfly_ajax_admin_menu'));
  }
  /**
   * Create admin menu page for butterfly-ajax menu
   * 
   * @since 1.0.0
   * @return void
   */
  public function create_butterfly_ajax_admin_menu() {
    add_menu_page(
      __('Butterfly Ajax', 'Butterfly Ajax'), //page title
      __('Butterfly Ajax', 'Butterfly Ajax'), //menu title
      'manage_options', //capability
      'butterfly-ajax', //slug
      array($this, 'butterfly_ajax_form'), //callback
    );
  }
  /**
   * Butterfly ajax form callback
   * 
   * @since 1.0.0
   * @return void
   */
  public function butterfly_ajax_form() {
    ?>
      <h2><?php echo esc_html__('Hello Butterfly WP', 'butterfly-ajax'); ?></h2>
      <p><?php echo esc_html__('Agency Notificaton: Please subscribe to our newsletter', 'butterfly-ajax'); ?></p>     
      <form class="bwp-form">
        <input type="text" placeholder="Enter your name" />
        <button type="submit">Send</button>
      </form>
  <? }
  
}