<?php

/**
 * Interface for Butterfly School Management
 * 
 * @since 1.0.0
 */
interface Butterfly_School_Management {
    public function display_count();
}
/**
 * Class For School Management
 * 
 * In this class we will add all functionality for school management
 * 
 * @since 1.0.0
 * 
 * @return void
 */

 class School_Management implements Butterfly_School_Management {
    public function display_count() {
        echo "Count of School Is: 30";
    }
 }
 /**
 * Class For Teacher Management
 * 
 * In this class we will add all functionality for teacher management
 * 
 * @since 1.0.0
 * 
 * @return void
 */

 class Teacher_Management implements Butterfly_School_Management {
    public function display_count() {
        echo "Count of Teacher Is: 50";
    }
 }
 /**
 * Class For Student Management
 * 
 * In this class we will add all functionality for student management
 * 
 * @since 1.0.0
 * 
 * @return void
 */

 class Student_Management implements Butterfly_School_Management {
    public function display_count() {
        echo "Count of Student Is: 10";
    }
 }

 

 /**
  * Main class for Single responsibility Principal
  * 
  * @since 1.0.0
  */
  class Single_Responsibility_Principal {
    // our required attributes
    private static $_instance;
    private $obj;
    /**
     * Create an instance for access class object
     * 
     * @param static $_instance
     * 
     * @return static $_instance
     * 
     * @static
     */
    public function instance() {
        if( empty( !self::$_instance ) ) {
            self::$_instance = new Self();
        }
        return self::$_instance;
    }
    /**
     * Display Object count
     * 
     * This function will display object count for given object
     * 
     * @param Butterfly_School_Management $obj this object is type of Butterfly_School_Management
     * 
     * @return void this function have not returned anything yet.
     */
    public function displayObject_count(Butterfly_School_Management $obj) {
        $this->obj = $obj;
        echo "<br/>";
        // display count
        $this->obj->display_count();
    }
  }
 //   declare objects
 $single_principal = new Single_Responsibility_Principal();
 $school_management = new School_Management();
 $teacher_management = new Teacher_Management();
 $student_management = new Student_Management();
 $single_principal->displayObject_count( $student_management );
