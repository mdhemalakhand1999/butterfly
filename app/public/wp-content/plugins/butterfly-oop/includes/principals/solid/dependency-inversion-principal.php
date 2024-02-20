<?php
/**
 * Interface for Butterfly_Attandence
 * 
 * @function attance();
 * 
 * @return void this is not return anything
 * 
 * @package Butterfly OOP
 * 
 * @since 1.0.0
 */
interface Butterfly_Attandence {
    public function attance();
}
/**
 * Class for Teacher Management
 * 
 * This class is for manage teacher works and also get attandence of teachers.
 * 
 * @since 1.0.0
 */
class TeacherManagement implements Butterfly_Attandence {
    public function teacherWorks() {}
    public function attance() {
        echo "Attandence from teacher";
    }
}
/**
 * Class for Student Management
 * 
 * This class is for manage student works and also get attandence of students.
 * 
 * @since 1.0.0
 */
class StudentManagement implements Butterfly_Attandence {
    public function studentWorks() {}
    public function attance() {
        echo "Attandence from student";
    }
}

/**
 * Dependency Inversion Principal
 * 
 * Dependency inversion principal is basically for handle multiple class based on an object
 * 
 * @package Butterfly OOP
 */

 class Dependency_Inversion_Principal {
    // our required attributes
    private static $_instance;
    private $object;
    /**
     * Create an instance
     * 
     * Create an instance for access class object.
     * 
     * @param object $_instance;
     * 
     * @static
     * 
     * @return static $_instance instance will be returned
     */
    public static function instance() {
        if( !self::$_instance ) {
            self::$_instance = new Self();
        }
        return self::$_instance;
    }
    /**
     * Dependency inversion principal
     * 
     * @param Butterfly_Attandence $obj this is an object of class which type is Butterfly_Attandence
     * 
     * @since 1.0.0
     */
    public function butterfly_school_management(Butterfly_Attandence $obj) {
        $this->object = $obj;
        echo "<br/>";
        $this->object->attance();
    }
 }
 // declare objects of class
 $principal = new Dependency_Inversion_Principal();
 $teacher_obj = new TeacherManagement();
 $student_obj = new StudentManagement();
 $principal->butterfly_school_management($student_obj);