<?php
/**
 * Register HTTP Request
 * 
 * Create a class which will return a HTTP Response
 * 
 * @package Butterfly Rest API
 * 
 * @since 1.0.0
 */
class Register_HTTP_Request {
    private static $_instance;  
    /**
     * Create an instance
     * 
     * In this instance() function, basically we've created an instance for Register_HTTP_Request class
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
     * Create constructor for Register_HTTP_Request class
     * 
     * Here we've declared all necessary action or functions which will call automatically.
     * 
     * @since 1.0.0
     * 
     * @see https://developer.wordpress.org/plugins/hooks/actions/
     */
    public function __construct() {
        add_action( 'init', [ $this, 'butterfly_get_api_response_by_http' ] );
        add_action( 'init', [ $this, 'butterfly_get_api_response_by_fopen' ] );
        add_action( 'init', [ $this, 'butterfly_get_api_response_by_fopen_standard' ] );
        add_action( 'init', [ $this, 'butterfly_get_api_response_by_fsockopen' ] );
        add_action( 'init', [ $this, 'butterfly_get_api_response_by_curl' ] );
    }
    /**
     * Get Response Via HTTP
     * 
     * Get a response by http request as string
     * 
     * @function send()
     * 
     * @function getResponseBody()
     * 
     * @since 1.0.0
     */
    public function butterfly_get_api_response_by_http() {
        $r = new HttpRequest( 'https://wordpress.org/', 'POST' );
        $r->send();
        echo $r->getResponseBody();
    }
    /**
     * Get stream data using fopen
     * 
     * @since 1.0.0
     * 
     * @param $stream If url can be readable, then this data will store into stream 
     * 
     * @return void
     */
    public function butterfly_get_api_response_by_fopen() {
        // if url is redeable then store data into $stream
        if( $stream = fopen( 'https://wordpress.org', 'r' ) ) { //$url, $mode
            echo stream_get_contents( $stream );
            fclose();
        }
    }
    /**
     * Using fopen in a standard format
     */
    public function butterfly_get_api_response_by_fopen_standard() {
        $handle = fopen( 'https://wordpress.org', 'r' );
        $content = '';
        while( !feof( $handle ) ) {
            $content .= fread( $handle, 8192 ); // handle, length
        }
        fclose($handle);
        echo $content;
    }
    /**
     * Retrive data using fsockopen() function
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function butterfly_get_api_response_by_fsockopen() {
        $fp = fsockopen( 'http://www.example.com', 80, $errno, $errstr, 30 );
        if(!$fp) {
            echo "$errstr ($errno)<br/> \n";
        } else {
            $out = "GET / HTTP/1.1\r\n";
            $out .= "Host: www.example.com\r\n";
            $out .= "Connection: Close\r\n\r\n";
            fwrite( $fp, $out );
            while( !feof( $fp ) ) {
                echo fgets( $fp, 128 );
            }
            fclose();
        }
    }
    /**
     * Curl request
     */
    public function butterfly_get_api_response_by_curl() {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, 'https://wordpress.org/' );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_exec( $ch );
        curl_close( $ch );
    }
}