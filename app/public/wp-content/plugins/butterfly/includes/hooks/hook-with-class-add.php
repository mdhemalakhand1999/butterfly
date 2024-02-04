<?php
/**
 * Hook with class.php
 * 
 * @since 1.0.0
 * @return void
 */
class Butterfly_Hook_Class_Add {
    /**
     * The single instance of the class
     * 
     * @var Butterfly
     * @since 1.0.0
     */
    protected static $_instance = null;
    /**
     * Create an instance for Butterfly_Hook_Class_Add class
     * Please see: https://woocommerce.wp-a2z.org/oik_api/woocommerceinstance/ for details
     * 
     * @since 1.0.0
     * @static
     * @return Butterfly_Hook_Class_Add main instance
     */
    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
    /**
     * Butterfly Constructor
     */
    public function __construct() {
        $this->init_hooks();
    }
    /**
     * All butterfly initialize hooks are here
     * 
     * @since 1.0.0
     */
    private function init_hooks() {
        add_action('butterfly_before_class_form', [$this, 'butterfly_insert_info_message_in_form']);
        add_action('butterfly_form_class_submit', [$this, 'butterfly_insert_info_message_after_form']);
        add_filter('butterfly_class_form_username', [$this, 'butterfly_change_username']);
        add_filter('butterfly_form_class_password', [$this, 'butterfly_change_password']);
    }
    /**
     * Insert some information before form in butterfly
     * 
     * @return void
     * @since 1.0.0
     */
    public function butterfly_insert_info_message_in_form() {
        ob_start();?>
            <p><?php echo __('Please login before submit your form', 'butterfly'); ?></p>
        <?php 
        echo ob_get_clean();
    }
    /**
     * Insert some information after form in butterfly
     * 
     * @return void
     * @since 1.0.0
     * */
    function butterfly_insert_info_message_after_form($id) {
        ob_start();?>
        <p><?php echo __('Your form ID: ', 'butterfly'); echo esc_html($id); ?></p>
        <?php
        echo ob_get_clean();
    }
    /**
     * Change username of this form
     * 
     * @return void
     * @since 1.0.0
     */
    public function butterfly_change_username() {
        ob_start();
        $label = "Please entert your message";
        oB_get_clean();
        return $label;
    }
    /**
     * Change password of this form
     * 
     * @return void
     * @since 1.0.0
     */
    public function butterfly_change_password() {
        ob_start();
        $label = "Class form pass";
        ob_get_clean();
        return $label;   
    }
}
new Butterfly_Hook_Class_Add();