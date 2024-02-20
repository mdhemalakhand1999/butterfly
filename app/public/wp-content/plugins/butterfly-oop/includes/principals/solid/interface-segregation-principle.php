<?php
/**
 * School management interface
 * 
 * Here we will provide all essential functions which is requried for school management
 * 
 * @since 1.0.0
 * 
 * @package Butterfly OOP
 */
interface School_Management_Interface {
    function student_count();
    function teacher_attandence();
    function teacher_count();
}
/**
 * Hospital management interface
 * 
 * Here we will provide all essential functions which is requried for Hospital management
 * 
 * @since 1.0.0
 * 
 * @package Butterfly OOP
 */
interface Hospital_Management_Interface {
    function hospital_count();
    function doctor_attandence();
    function doctor_count();
}
/**
 * University management interface
 * 
 * Here we will provide all essential functions which is requried for University management
 * 
 * @since 1.0.0
 * 
 * @package Butterfly OOP
 */
interface University_Management_Interface {
    // university management functions
}
/**
 * Create a class for School_Management_Class management
 * 
 * In this class, we will add all functionality which is related for School_Management_Class management.
 * 
 * @package Butterfly OOP
 * 
 * @return void
 */
class School_Management_Class implements School_Management_Interface {
    function student_count() {
        echo _x( 'Student Count: 30', 'Count of student of this school', 'butterfly-oop' );
    }
    function teacher_attandence() {
        echo _x( 'Teacher Attandence: 50', 'Attandence of teacher of this school', 'butterfly-oop' );

    }
    function teacher_count() {
        echo _x( 'Teacher Count: 30', 'Count of teacher of this school', 'butterfly-oop' );
    }
}
/**
 * Create a class for Interface Segregation principle
 * 
 * @package Butterfly OOP
 * 
 * @since 1.0.0
 * 
 * @param object $_instance this instanse will store current class object
 * 
 * @param object $obj this variable will store class of  Shool_Management_Interface type
*/
class Interface_Segregation_Principle {
    // required attributes
    private static $_instance; // instace varaible
    private $obj; // object of a class
    /**
     * Create a function which will create an instance object of own class
     * 
     * @since 1.0.0
     * 
     * @return static $_instance
     */
    public function instance() {
        if( !self::$_instance ) {
            self::$_instance = new Self();
        }
        return self::$_instance;
    }
    /**
     * Create a function which will display all essential information which is related to School_Management_Interface interface
     * 
     * @package Butterfly OOP
     * 
     * @since 1.0.0
     * 
     * @param object $obj this will get class object
     */
    public function essential_information( School_Management_Interface $obj ) {
        $this->obj = $obj;
        echo "<br/>";
        echo "----------------------------------";
        echo "<br/>";
        $this->obj->student_count();
        echo "<br/>";
        $this->obj->teacher_attandence();
        echo "<br/>";
        $this->obj->teacher_count();
    }
}


// create object of classes
$interface_segregation_principle = new Interface_Segregation_Principle();
$school_mangement =  new School_Management_Class();
$interface_segregation_principle->essential_information( $school_mangement );