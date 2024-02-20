<?php
 /**
  * Create an interface for school management
  */
interface SchoolManagement {
    public function manageTeacher();
    public function manageStudent();
    public function manageExam();
}
/**
 * Create a class for teacher management
 * 
 * @since 1.0.0
 */
class Manage_Techer implements SchoolManagement {
    public function manageTeacher() {}
    public function manageStudent() {}
    public function manageExam() {
        echo "Manage exam from teacher";
    }
}
class Manage_Student implements SchoolManagement {
    public function manageTeacher() {}
    public function manageStudent() {}
    public function manageExam() {
        echo "Manage exam from student";
    }
}
/**
 * Open close principal
 * 
 * Open close is basically Open for extension and close for modification.
 * 
 * @param private static $_instance is basically self class object
 * 
 * @param private $obj its basically for store an object
 * 
 * @package Butterfly OOP 
 */
class Open_Close_Principal {
    // required attributes
    private static $_instance;
    private $obj;
    /**
     * Create an instance for this class
     * 
     * So that, anyone can access any attribute/methods from this class
     * 
     * @return static $_instance this function will return a static instance
     */
    public function instance() {
        if( !self::$_instance ) {
            self::$_instance = new Self();
        }
        return self::$_instance;
    }
    /**
     * Main function for use display exam functionality
     */
    public function manageExam(SchoolManagement $obj) {
        echo "<br/>";
        if( !empty( $obj ) ) {
            $obj->manageExam();
        }
    }
}

$open_close_principal = new Open_Close_Principal();
$manage_teacher = new Manage_Techer();
$manage_student = new Manage_Student();

$open_close_principal->manageExam($manage_student);