<?php
/**
 * Create an interface for school management
 * 
 * @package Butterfly OOP
 * 
 * @since 1.0.0
 */
interface Butterfly_Basic_Asset_Management {
    function manage_fees();
    function manage_exam_charge();
}
/**
 * interface for hospital management
 * 
 * @interface
 */
interface Hospital_Management {
    function total_hospital_count();
}
/**
 * interface for school management
 * 
 * @interface
 */
interface Butterfly_Edu_School_Management {
    function school_management();
    function total_teacher_count();
}

/**
 * Class for school management
 * 
 * @since 1.0.0
 */
class Butterfly_ShoolManagement implements Butterfly_Basic_Asset_Management, Butterfly_Edu_School_Management {
    function manage_fees(){
        echo "School Fee: $50";
    }
    function manage_exam_charge(){
        echo "School exam charge: $60";
    }
    function school_management() {}
    function total_teacher_count() {
        echo "Total teacher count is: 30";
    }
}
/**
 * Create a class for hospital management functionality
 * 
 * @since 1.0.0
 * 
 * @package Butterfly OOP
 */
class HospitalManagement implements Butterfly_Basic_Asset_Management, Hospital_Management {
    function manage_fees(){
        echo "Hospital Fee: $50";
    }
    function manage_exam_charge(){
        echo "Hospital exam charge: $60";
    }
    function total_hospital_count() {}
}
/**
 * Main class for Liskov Substitution Principle
 * 
 * @package Butterfly OOP
 * 
 * @since 1.0.0
 * 
 * @param Butterfly_Basic_Asset_Management $obj
 */
class Liskov_Substitution_Principle {
    // our required attributes
    private static $_instance;
    private $object;
    private $object_school;
    /**
     * Create an instance
     * 
     * Create an instance so that, anyone can use our class and add there own functionality
     * 
     * @since 1.0.0
     * 
     * @package Butterfly OOP
     * 
     * @return static $_instance this funciton will return self/own class instance
     */
    public function instance() {
        if( !self::$_instance ) {
            self::$_instance = new Self();
        }
        return self::$_instance;
    }
    /**
     * Display Basic Management Functionality
     * 
     * @since 1.0.0
     * 
     * @param Butterfly_Basic_Asset_Management $obj
     * 
     * @return void
     */
    public function basic_management(Butterfly_Basic_Asset_Management $obj) {
        $this->object = $obj;
        echo "<br/>";
        $this->object->manage_fees();
        echo "<br/>";
        $this->object->manage_exam_charge();
    }
    /**
     * Create a function for basic school management
     */
    public function basic_school_management(Butterfly_Edu_School_Management $obj) {
        $this->object_school = $obj;
        echo "<br/>";
        $this->object_school->total_teacher_count();
    }
}

// uses of class object
$liskov_substitution_principal = new Liskov_Substitution_Principle();
$school_management = new Butterfly_ShoolManagement();
$hospital_management = new HospitalManagement();
$liskov_substitution_principal->basic_management( $school_management );
$liskov_substitution_principal->basic_school_management( $school_management );