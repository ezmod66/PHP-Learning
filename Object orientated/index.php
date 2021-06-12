<?php

require_once "Person.php";
require_once "Student.php";

$student = new Student('Bob',"john", '1234');
echo '<pre>';
var_dump($student);
echo '</pre>';

//$p = new Person('Shaun', 'Timz');
//$p->setAge(30);

//echo '<pre>';
//var_dump($p);
//echo '</pre>';
//echo $p->getAge();

//$p2 = new Person('John', 'smith');

//echo '<pre>';
//var_dump($p2);
//echo '</pre>';
//echo Person::getCounter(); //print current counter of the perosn class.(How many times its been instantiated)



// Create Person class in Person.php

// Create instance of Person

// Using setter and getter