<?php
/**
 * Remove all essential Hook for this form
 */

 class Butterfly_Remove_Class {
    /**
     * A single static instance of the class
     * 
     * @var Butterfly
     * @since 1.0.0
     */
    protected static $_instance = null;
    /**
     * Create an instance of Butterfly_Remove_Class class
     * Please see: https://woocommerce.wp-a2z.org/oik_api/woocommerceinstance/ for details
     * 
     * @since 1.0.0
     * @static
     * @return Butterfly_Remove_Class main instanct
     */
    public static function instance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Self();
        }
        return self::$_instance;
    }
    /**
     * Butterfly_Remove_Class Constructor
     */
    public function __construct() {
       $this->init_hooks();
    }
    /**
     * All actions are here
     */
    public function init_hooks() {
         // remove message before form
         remove_action('butterfly_before_class_form', [Butterfly_Hook_Class_Add::instance(), 'butterfly_insert_info_message_in_form']);
         //  remove filter
         remove_filter('butterfly_form_class_password', [Butterfly_Hook_Class_Add::instance(), 'butterfly_change_password']);
    }
 }
 new Butterfly_Remove_Class();