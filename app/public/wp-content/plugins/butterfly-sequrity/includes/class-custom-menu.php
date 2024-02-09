<?php
/**
 * Create a class for register custom menu
 * 
 * @since 1.0.0
 * 
 * @return void
 */
class Custom_Menu {
    protected $_instance = null;
    /**
     * Create a constructor of Custom_Menu class
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function __construct() {
        add_action('admin_menu', [$this, 'butterfly_sequrity_admin_menu']);
        add_action('init', [$this, 'butterfly_nonce_form_submit']);
    }
    /**
     * Create an instance for create self object
     * 
     * This will help to access Custom_Menu class functions/methods
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
     * Create main menu or submenu for butterfly sequrity plugin
     * 
     * Hooked admin_menu
     * 
     * @since 1.0.0
     * 
     * @return void
     * 
     */
    public function butterfly_sequrity_admin_menu() {
        add_menu_page(
            __('Butterfly Sequrity'), // page title
            __('Butterfly Sequrity'), // menu title
            'manage_options', //capability
            'butterfly-sequrity', //menu slug
            [$this, 'butterfly_sequrity_menu_callback'],
            'editor-video' //icon
        );
    }
    /**
     * Sequrity menu output callback
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_sequrity_menu_callback() {
        /**
         * Create a nonce url
         * 
         * @param $nonce_url
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        $url = add_query_arg(
            array(
                'action' => 'edit',
                'user'   => 300
            ),
            admin_url('users.php')
        );
        $nonce_url = wp_nonce_url( $url, 'edit', 'edit_butterfly_user' ); //url, action, $name
        echo '<h2>Nonce URL: '.esc_url($nonce_url).'</h2>';
        /**
         * Create a form using nonce
         */
        ob_start();
        ?>
            <form method="post">
                <h2><?php echo esc_html_e( 'A form with nonce', 'butterfly-sequrity' ); ?></h2>
                <!-- create a nonce -->
                <?php wp_nonce_field( 'butterfly_nonce_action', 'butterfly_nonce_name' ); ?>
                <input type="text" name="subscribe_input" id="subscribe_input" placeholder="<?php echo esc_attr_x( 'Please enter your email', 'Email form for subscribe', 'butterfly-sequrity' ); ?>">
                <?php submit_button('Submit', 'primary'); ?>
            </form>
        <?php echo ob_get_clean();
        
        /**
         * Identifying Potentially Tainted Data
         * 
         * @param $safe, $fruits, $age
         * 
         */
        $safe = [];
        $age = -30;
        $safe['age'] = absint( $age ); //convert to positive value
        $safe['fruit'] = 'my_apple';
        $fruits = [
            'banana',
            'my_apple',
            'orange'
        ];
        echo "<br/>";
        /**
         * If $safe['fruit'] is in $fruits
         * 
         * Then only keep wp_unslash($value) data on safe array
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        if( in_array( wp_unslash( $safe['fruit'] ), $fruits, true ) ) {
            ob_start();
            $safe['fruit'] = wp_unslash( $safe['fruit'] );
            var_dump($safe);
            echo ob_get_clean();
        }
        echo "<br/>";
        /**
         * Sanitize integer in WordPress
         * 
         * echo something
         * 
         * @param $number
         * 
         * @return void
         * 
         */
        $number = 100;
        if((intval($number) === 100)) {
            echo _ex( 'After validation: number is: ', 'First validate number, then show this message', 'butterfly-sequrity' ). intval($number);
        } else {
            echo wp_strip_all_tags( '<h2>Sorry! Number is not validate</h2>' );
        }
        /**
         * Strip anything that not a digit
         * 
         * Using ctype_digit($value)
         * 
         * @return void
         */
        $big_num = '1234';
        $sanitized_num = ctype_digit($big_num);
        echo "<br/>";
        _ex('After sanitize digit, output is: ', 'Sanitize any input to digit, if not a digit, this will removed automatically', 'butterfly-sequrity');
        echo $sanitized_num;
        /**
         * Using sanitize_text_field() for sanitize any type of text
         */
        echo "<br/>";
        $info = "After sanitize text field: Here is your <em>Info</em> And <h2>Heading 2</h2>";
        echo sanitize_text_field( $info );
        echo '<br/>';
        /**
         * Validate and sanitize key
         */
        $key = 'hello_butterfly_113';
        //validate
        preg_match( '/^[a-z0-9-_]+$/', '', $key );
        echo __('Key is: ', 'butterfly-sequrity'). sanitize_key( $key ); // not working
        /**
         * validate and sanitize email
         * 
         * is_email() for validate
         * 
         * sanitize_email() for sanitize
         */
        $email = 'hemalrika@gmail.com';
        echo '<br/>';
        // sanitize
        if(is_email($email)) {
            //sanitize email
            echo esc_html_x( 'Your email is: ', 'This will escape this email', 'butterfly-sequrity' ). sanitize_email($email);
        } else {
            echo esc_html_e( 'Please enter a valid email', 'butterfly-sequrity' );
        }
        /**
         * Escaping URL from our plugin
         * 
         * @function esc_url() for escape generic url
         * 
         * @function esc_url_raw() escape url for database
         */
        $url = 'www.google.com';
        echo '<br/>';
        echo _x( 'Your url: ', 'A regular URL: ', 'butterfly-sequrity' ). esc_url($url);
        echo '<br/>';
        echo _x( 'Your Database url: ', 'A database URL: ', 'butterfly-sequrity' ). esc_url_raw($url);
        /**
         * Force wordpress to balance html tags
         * 
         * This is helpfull if any tag are missing, or in incorrect position
         * 
         * wordpress will manage tag issue automatically
         * 
         * @function force_balance_tags()
         */
        echo force_balance_tags('<h2>Hello Its Heading <span>Its span</h2></span>'); // here h2 and span possition are incorrect. But wordperss will solve this automatically
        /**
         * Using wp_kses() for allow specific tag
         * 
         * Its usefull when we give access only few tags
         */
        $allowed = [
            'strong' => [
                'class' => []
            ],
            'em' => [
                'class' => []
            ],
            'a' => [
                'href' => [],
                'title' => [],
                'class' => []
            ]
        ];
        $text = '<h1>Hello from butterfly <em>Team</em></h1>';
        echo _e('Using wp_kses: ', 'butterfly-sequrity').wp_kses($text, $allowed);
        echo '<br/>';
        /**
         * We can also use wp_kses_data()
         */
        echo _e('Using wp_kses_data: '). wp_kses_data( $text );
        echo '<br/>';
        /**
         * Using sanitize_html_class for sanitize array of class
         * 
         * We've used join, for array to strong ( with commma seperate )
         * 
         * @functions array_map(), join()
         * 
         * @since 1.0.0
         * 
         * $param $classes
         * 
         * @type array
         */
        $classes = [
            'media',
            'media-object',
            'media-image'
        ];
        $classes = array_map('sanitize_html_class', $classes);
        echo __('After sanitize all classes: ', 'butterfly-sequrity'). join(', ', $classes );
        echo '<br/>';
    }
    /**
     * Check nonce of form
     * 
     * If form is submitted
     * 
     * @since 1.0.0
     * @return void
     */
    public function butterfly_nonce_form_submit() {
        /**
         * If nonce not exits, then return
         */
        if(!isset($_POST['butterfly_nonce_name'])) {
            return;
        }
        /**
         * Check if nonce are verified
         * 
         * If not then stop working and show a warning message
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        if( ! wp_verify_nonce( $_POST['butterfly_nonce_name'], 'butterfly_nonce_action' )) {
            wp_die('Your nonce could not verified!');
        }
        /**
         * If nonce are valid and also exists
         * 
         * Then procced to next action
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        if( $_POST['butterfly_nonce_name'] ) {
            // create or update an option
            update_option( 'butterfly_subscribe_mail', wp_strip_all_tags( $_POST['subscribe_input'] ) );
        }
        /**
         * If successfully updated, then redirect to admin.php?page=butterfly-sequrity
         * 
         * @function wp_safe_redirect()
         * 
         */
        wp_safe_redirect( admin_url('admin.php?page=butterfly-sequrity') );
    }
}
