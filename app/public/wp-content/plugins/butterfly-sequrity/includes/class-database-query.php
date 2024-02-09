<?php
/**
 * Create a class which will query with sanitize
 * 
 * Its only for codebase. So! We've not included this on main file.
 * 
 * @since 1.0.0
 */
class Database_Query {
    protected $_instance = null;

    /**
     * Create an instance for create self object
     * 
     * This will help to access Database_Query class functions/methods
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
     * Create a constructor for Database_Query class
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function __construct() {
        $this->select_user_data();
        $this->working_with_wpdb_query_and_update();
        $this->working_with_wpdb_insert();
        $this->select_a_variable_using_wpdb();
        $this->select_a_row_using_wpdb();
        $this->select_a_column_using_wpdb();
        $this->select_generic_results_using_wpdb();
        $this->prevent_sql_injection_in_wpdb();
        $this->cache_data_in_wordpess();
        $this->store_data_using_transient_in_wordpess();
    }
    /**
     * Select all user data from users table
     * 
     * @since 1.0.0
     */
    public function select_user_data() {
        $login    = esc_sql( 'butterfly' );
        $password = esc_sql( "123456' OR 1 = '1" );
        $sql      = "SELECT * FROM users WHERE `login` = '$login' AND `pass` = '$password'";
    }
    /**
     * Important uses of $wpdb object
     * 
     * @functions $wpdb->query(), $wpdb->update()
     */
    public function working_with_wpdb_query_and_update() {
        global $wpdb;
        /**
         * Using $wpdb->query() method
         */
        $title = esc_sql('Butterfly Post');
        $id    = absint( 230 );
        $wpdb->query("UPDATE $wpdb->posts SET post_title='$title' WHERE ID=$id");
        /**
         * Using $wpdb->update() method
         */
        $wpdb->update( $wpdb->posts, $data, $where );
        /**
         * Explained Update Methods
         * 
         * for $wpdb Objects
         */
        // data to update
        $data = array(
            'post_title' => __('Buterfly Updated Post Title', 'butterfly-sequrity'),
            'post_autor' => absint( 230 )
        );
        // where it should update
        $where = array(
            'ID' => 150
        );
        // format of data
        $format = array(
            '%s', //Maps of post_title
            '%d', //Maps of post_author
        );
        $where_format = array(
            '%d', //Maps of id
        );

        return $wpdb->update($wpdb->posts, $data, $where, $format, $where_format); //posts, data, where
    }
    /**
     * Working on $wpdb->insert()
     * 
     * @since 1.0.0
     */
    public function working_with_wpdb_insert() {
        // data to update
        $data = array(
            'post_title' => __('Buterfly New Post Title', 'butterfly-sequrity'),
            'post_autor' => absint( 230 )
        );
        // format of data
        $format = array(
            '%s', //Maps of post_title
            '%d', //Maps of post_author
        );

        return $wpdb->insert($wpdb->custom, $data, $format); // return updated data or failure
    }
    /**
     * Select a variable using $wpdb object
     * 
     * @function get_var()
     * 
     * @return type int
     */
    public function select_a_variable_using_wpdb() {
        global $wpdb;
        $query = "SELECT COUNT(ID) FROM {$wpdb->posts} WHERE post_status = 'publish'";
        return $wpdb->get_var($query); // return number of published post
    }
    /**
     * Select a row using $wpdb object
     * 
     * @function get_row()
     * 
     * @return type object
     */
    public function select_a_row_using_wpdb() {
        global $wpdb;
        // $wpdb->get_row( string|null $query = null, string $output = OBJECT, int $y = 0 );
        $query = "SELECT * FROM {$wpdb->users} WHERE user_login = 'admin'";
        $wpdb->get_row($query);
    }
    /**
     * Select a column using wpdb
     * 
     * @function get_col()
     * 
     * @return type array
     */
    public function select_a_column_using_wpdb() {
        global $wpdb;
        // $wpdb->get_col( string|null $query = null, int $x = 0 );
        $query = "SELECT user_email FROM {$wpdb->users}";
        return $wpdb->get_col($query);
    }
    /**
     * Select a generic results using $wpdb
     * 
     * @function get_results()
     * 
     * @return type array
     */
    public function select_generic_results_using_wpdb() {
       $query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts
                FROM $wpdb->posts
                WHERE post_type = 'post' AND post_status = 'publish'
                GROUP BY YEAR(post_date)
                ORDER BY post_date DESC";
        return $wpdb->get_results($query, ARRAY_A); // return assosiative array
    }
    /**
     * Prevent SQL Injection in $wpdb
     * 
     * @statement prepare()
     * 
     * @return type any
     */
    public function prevent_sql_injection_in_wpdb() {
        global $wpdb;
        $user_id = 1;
        $unsafe_query = "SELECT post_title
                        FROM {$wpdb->posts}
                        WHERE post_status = 'publish'
                        AND post_author = %d";
        $safe_query = $wpdb->prepare($unsafe_query, $user_id); // using prepare() statement for prevent sql injection
        return $wpdb->get_results($safe_query);
    }
    /**
     * Some methods for cache data in wordpress
     */
    public function cache_data_in_wordpess() {
        /**
         * Set a cached data
         * 
         * @return type array
         * 
         * @param $posts
         */
        $posts = array(); //array of data
        // wp_cache_set( $key:integer|string, $data:mixed, $group:string, $expire:integer );
        wp_cache_set('my_old_posts', $posts, 'butterfly_related_posts', DAY_IN_SECONDS);
        /**
         * Get a cached data
         */
        // wp_cache_get( $key:integer|string, $group:string, $force:boolean, $found:boolean|null )
        $posts = wp_cache_get( 'my_old_posts', 'butterfly_related_posts' ); // get all data
        foreach($posts as $post) {
            // do whatever you want.
        }
        /**
         * Delete a cached data
         * @param $post_id
         * @return
         */
        // wp_cache_delete( $post_id, 'pdev_related_posts' );
        $post_id = get_the_ID();
        return wp_cache_delete( 'my_old_posts', 'butterfly_related_posts' );
    }
    /**
     * Store data using transient
     * 
     * Here We've shown structure only
     * 
     * @since 1.0.0
     */
    public function store_data_using_transient_in_wordpess() {
        // set_transient( $transient:string, $value:mixed, $expiration:integer );
        set_transient( 'pdev_video_tutorial', 'How to Install WordPress', DAY_IN_SECONDS );
        // get transient
        $video = get_transient( 'pdev_video_tutorial' );
        // delete transient
        delete_transient( 'pdev_video_tutorial' );
    }
}