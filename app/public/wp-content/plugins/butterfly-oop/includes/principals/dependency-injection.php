<?php
/**
 * Create a class for dependency injection
 * 
 * Dependency injection mean simply, this will retrive a new object and then access its methods. This used for create multiple object with multiple functionality but for same function.
 * 
 * @since 1.0.0
 */

//  interface of basic student
interface BasicStudent {
    function setName( $name );
    function setAge( $age );
    function setRoll( $roll );
}
/**
 * Insert student information
 */
class InsertStudent implements BasicStudent {
    // essential variables
    private static $_instance;
    private $name, $age, $roll;
    /**
     * Create an instance for create self object
     * 
     * This will help to access Database InsertStudent functions/methods
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
     * Create a constructor which will set $name, $age, $roll
     * 
     * @param string $name this is the name of student
     * 
     * @param int $age this is the age of student
     * 
     * @param int $roll this is the roll of student
     * 
     * @return void this function will not return anything 
     */
    public function __construct( $name, $age, $roll ) {
        $this->name = $name;
        $this->age = $age;
        $this->roll = $roll;
    }
    // set name
    public function setName( $name ) {
        $this->name = $name;
    }
    // set age
    public function setAge( $age ) {
        $this->age = $age;
    }
    // set roll
    public function setRoll( $roll ) {
        $this->roll = $roll;
    }
    // display name
    public function displayName() {
        echo '<br/>Student Name: '. $this->name;
    }
    // display age
    public function displayAge() {
        echo '<br/>Student Age: '. $this->age;
    }
}
/**
 * Create a dependency injection class which will print student name
 * 
 * @since 1.0.0
 * 
 * @package Butterfly OOP
 */

class DisplayStudent {
    // essential variables
    private static $_instance;
    /**
     * Create an instance for create self object
     * 
     * This will help to access Database InsertStudent functions/methods
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
     * Create a dependency injection function which will take a object as argument
     * 
     * And use displayName() function from object to display name
     * 
     * This will must implement BasicStudent interface
     * 
     * @param BasicStudent $student_obj Its a class object which type is BasicStudent
     * 
     * @since 1.0.0
     */
    public function displayStudntName(BasicStudent $student_obj) {
        // display name of student
        $student_obj->displayName();
        echo '<br/>';
        // age
        $student_obj->displayAge();
    }
}


// Insert a student
$student_1 = new InsertStudent( __('MD Hemal Akhand', 'butterfly-oop'), 24, 01 );
// display student
$display_std = new DisplayStudent();
$display_std->displayStudntName( $student_1 );