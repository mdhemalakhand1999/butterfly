<?php
namespace ButterflyInternalization;
if(!defined('ABSPATH')) exit;
/**
 * Create a class for butterfly internalization
 * 
 * @since 1.0.0
 * @return void 
 */

class Butterfly_Internalization {
    protected static $_instance;
    /**
     * Create a constructor for Butterfly_Internalization class
     * 
     * all required functions will be included here
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function __construct() {
        $this->double_underscore_localization();
        $this->underscore_e_localization();
        $this->attribute_localization_without_print();
        $this->attribute_localization_with_print();
        $this->using_esc_html_for_translation_without_print();
        $this->using_esc_html_for_translation_with_print();
        $this->using_x_function_for_translate_with_context_without_print();
        $this->using_ex_function_for_translate_string_by_context_with_print();
        $this->using_esc_attr_x_function_for_translate_string_by_context_without_print();
        $this->using_esc_html_x_for_escape_html_with_context();
        $this->escape_text_with_singular_plural_check();
        $this->escape_text_with_singular_plural_check_by_context();
        $this->using_n_noop_function_for_keep_original_and_translated_value();
        $this->using_nx_noop_function_for_keep_original_and_translated_value_by_context();
    }
    /**
   * Create an instance for create self object
   * 
   * This will help to access Database Butterfly_Internalization functions/methods
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
     * Using __() function for localization text without echo
     * 
     * If we use this function, text will be localized
     * 
     * But text will not print.
     * 
     * So! we need to print (or echo ) manually
     * 
     * @since 1.0.0
     * 
     * @param $text, $domain
     * 
     * @return void
     */
    public function double_underscore_localization() {
        $text = __('Hey! Its team from butterfly. From our team lead Nazrul islam nayan vai', 'butterfly-internalization');
        echo $text;
    }
    /**
     * Using _e() function for localization with echo
     * 
     * If we use this function, this will localize and echo string automatically
     * 
     * so we don't need to write echo before variable call
     * 
     * @param $text, $domain
     * 
     * @return null
     */
    public function underscore_e_localization() {
        // output of the translated text
        _e('Hey! Its team from butterfly. From our team lead Nazrul islam nayan vai', 'butterfly-internalization');
    }
    /**
     * Using esc_attr__() function for localization attribute without echo
     * 
     * If we use this function, this will localize attribute but we need to echo manually
     * 
     * @param $text, $domain
     * 
     * @return image
     */
    public function attribute_localization_without_print() {
        ob_start();
        ?>
            <img src="image_src" alt="<?php echo esc_attr__('This is image of butterfly', 'butterfly-internalization'); ?>">
        <?php return ob_get_clean();
    }
    /**
     * Using esc_attr_e() function is used for escaping attribute also echo automatically
     * 
     * So! we don't need to echo manually
     * 
     * @param $text, $domain
     * 
     * @return image
     */
    public function attribute_localization_with_print() {
        ob_start();
        ?>
            <img src="image_src" alt="<?php esc_attr_e('This is image of butterfly', 'butterfly-internalization'); ?>">
        <?php return ob_get_clean();
    }
    /**
     * Using esc_html__() for translation without print
     * 
     * This will escape and translate string
     * 
     * @param $text, $domain
     * 
     * @return void
     */
    public function using_esc_html_for_translation_without_print() {
        ob_start();
        ?>
            <h4><?php echo  esc_html__('Hey! Its team from butterfly. From our team lead Nazrul islam nayan vai', 'butterfly-internalization'); ?></h4>
        <?php echo ob_get_clean();
    }
    /**
     * Using esc_html_e() for escape and sanitize with print
     * 
     * @param $text, $domain
     * 
     * @return void
     */
    public function using_esc_html_for_translation_with_print() {
        ob_start();
        ?>
            <h4><?php echo  esc_html_e('Hey! Its team from butterfly. From our team lead Nazrul islam nayan vai', 'butterfly-internalization'); ?></h4>
        <?php echo ob_get_clean();
    }
    /**
     * By _x() function we can sanitize a text with context ( description )
     * 
     * Its like __() function, only diffrence is, we can also add our context
     * 
     * Its not print automatically
     * 
     * @param $text, $context, $domain
     * 
     * @return void
     */
    public function using_x_function_for_translate_with_context_without_print() {
        ob_start();
        ?>
            <h4><?php echo  _x('Pounds', 'Unit of Weight', 'butterfly-internalization'); ?></h4>
        <?php echo ob_get_clean();
    }
    /**
     * Using _ex() function we can sanitize string with context ( description )
     * 
     * Its like _e() function, only diffrence is, we can also add our context
     * 
     * Its print variable or string automatically
     * 
     * @param $text, $context, $domain
     * 
     * @return void
     */
    public function using_ex_function_for_translate_string_by_context_with_print() {
        ob_start();
        ?>
            <h4><?php _ex('Pounds', 'Unit of Weight', 'butterfly-internalization'); ?></h4>
        <?php echo ob_get_clean();
    }
    /**
     * Using esc_attr_x() function for translate string by content
     * 
     * This will not print text
     * 
     * @param $text, $context, $domain
     * 
     * @return void
     */
    public function using_esc_attr_x_function_for_translate_string_by_context_without_print() {
        ob_start();
        ?>
            <img src="image_src" alt="<?php echo esc_attr_x('This is image of butterfly', 'Its an alter text for butterfly image', 'butterfly-internalization'); ?>">
        <?php return ob_get_clean();
    }
    /**
     * Using esc_html_x() function for escape html with context
     * 
     * this will not print text
     * 
     * @param $text, $context, $domain
     * 
     * @return void
     */
    public function using_esc_html_x_for_escape_html_with_context() {
        ob_start();
        ?>
            <h4><?php echo esc_html_x('Pounds', 'Unit of Weight', 'butterfly-internalization'); ?></h4>
        <?php echo ob_get_clean();
    }
    /**
     * Using _n() function for escape for check singular/plural
     * 
     * This will check variable if singular or plural
     * 
     * If it's singular, This will return singular value
     * 
     * Otherwise if plural, This will return plural value
     * 
     * @param $single, $plural, $number, $domain
     * 
     * @return void
     */
    public function escape_text_with_singular_plural_check() {
        $product = 3;
        printf( _n('%s Product', '%s Products', $product, 'butterfly-internalization') );
    }
    /**
     * Using _nx() function for escape for check singular/plural with context
     * 
     * This will check variable if singular or plural
     * 
     * If it's singular, This will return singular value
     * 
     * Otherwise if plural, This will return plural value
     * 
     * We can define our own context or description
     * 
     * @param $single, $plural, $number, $context, $domain
     * 
     * @return void
     */
    public function escape_text_with_singular_plural_check_by_context() {
        $product = 3;
        printf( _nx('%s Product', '%s Products', $product, 'If value is singlular this will return singular value, if plural this will return plural value', 'butterfly-internalization') );
    }
    /**
     * This _n_noop() function will return an array of original and translated string both as array.
     * If it's singular, This will return singular array ( with original and translated string )
     * 
     * Otherwise if plural, This will return plural array ( with original and translated string )
     * 
     * @param $single, $plural, $domain, $number
     * 
     */
    public function using_n_noop_function_for_keep_original_and_translated_value() {
        $product = 3;
        printf( _n_noop('%s Product', '%s Products', 'butterfly-internalization'), $product );
    }
    /**
     * This _nx_noop() function will return an array of original and translated string both as array.
     * If it's singular, This will return singular array ( with original and translated string )
     * 
     * Otherwise if plural, This will return plural array ( with original and translated string )
     * 
     * We can define our own context
     * 
     * @param $single, $plural, $domain, $number
     * 
     */
    public function using_nx_noop_function_for_keep_original_and_translated_value_by_context() {
        $product = 3;
        printf( _nx_noop('%s Product', '%s Products', 'If value is singular this will return singular value, if plural this will return plural value', 'butterfly-internalization'), $product );
    }
}
new Butterfly_Internalization();