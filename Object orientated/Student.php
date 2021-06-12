<?php
/*Class inherits constructor and methods from parent*/
require_once "Person.php";

class Student extends Person//inheritence
{
    public string $studentID;

    public function __construct($name,$surname,$studentID)
    {
        $this->age = 18;
        $this->studentID = $studentID;
        parent::__construct($name, $surname);
    }
}

?>