<?php
/**
 * A method chaining is basically any function will return same class object
 * 
 * @important function must return a object
 * 
 * @package Method Chaining
 * 
 * Then after call the function, We can also browse other method in a class
 */

 class Method_Chaining {
    // initialize essential attributes.
    private $roll, $name, $age;
    // initialize a instance for returl self class object.
    private static $_instance;
    /**
     * Create an instance for create self object
     * 
     * This will help to access Database MethodChaining functions/methods
     * 
     * @since 1.0.0
     * 
     * @static
     * 
     * @param $_instance
     * 
     * @return static $_instance
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /**
     * Get Roll, Name, Age in constructor
     * 
     * This will add all values in 1 object.
     * 
     * @param int $roll|required this will store roll
     * 
     * @param string $name|required this will store name
     * 
     * @param int $age|required this will store age
     * 
     * @return object $this it will not return anything.
     */
    public function __construct($name, $age, $roll) {
        $this->roll = $roll;
        $this->name = $name;
        $this->age = $age;
        return $this;
    }
    /**
     * Create a single function for set a roll
     * 
     * @param string $roll this will store roll value
     * 
     * @return object $this it will not return anything.
     */
    public function set_roll( $roll ) {
        $this->roll = $roll;
        return $this;
    }
    /**
     * Create a single function for set a age
     * 
     * @param string $age this will store age value
     * 
     * @return object $this it will not return anything.
     */
    public function set_age( $age ) {
        $this->age = $age;
        return $this;
    }
    /**
     * Create a single function for set a name
     * 
     * @param string $name this will store name value
     * 
     * @return object $this it will not return anything.
     */
    public function set_name( $name ) {
        $this->name = $name;
        return $this;
    }
    /**
     * Create a single function for show a name
     * 
     * @return object $this it will not return anything.
     */
    public function get_name() {
        echo $this->name;
        return $this;
    }
    /**
     * Create a single function for show a age
     * 
     * @return object $this it will not return anything.
     */
    public function get_age() {
        echo $this->age;
        return $this;
    }
    /**
     * Create a single function for show a roll
     * 
     * @return object $this it will not return anything.
     */
    public function get_roll() {
        echo $this->roll;
        return $this;
    }
    /**
     * Create a seperator function for get a seperator
     * 
     * @return object $this it will not return anything.
     */
    public function get_seperator() {
        echo ", ";
        return $this;
    }
 }

 /**
  * Initialize class Here
  */

  $student_1 = new Method_Chaining("MD Hemal Akhand", 24, 01); //name, age, roll
// create a method chaining
  $student_1->set_name("MD Kamal")->set_age(30)->get_name()->get_seperator()->get_roll()->get_seperator()->get_age();