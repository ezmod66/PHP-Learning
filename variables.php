


<?php
// Variables (To concatinate use . between two strings)
$name = "Zura";
$age = 28;
$isMale = true; //1 true epmpty space = false(when its converted into string)
$height = 1.85; //double or float
$salary = null; //null converted to empty string

echo $name. '<br>';
echo $age. '<br>';
echo $isMale. '<br>';
echo $height. '<br>';
echo $salary. '<br>';

// Yypes of variables
echo gettype($name). '<br>';
echo gettype($age). '<br>';
echo gettype($isMale). '<br>';
echo gettype($height). '<br>';
echo gettype($salary). '<br>';

// Print whole variable(Useful to find variable or object information)
var_dump($name,$age,$isMale,$height,$salary);

// Change variable value
$name = false; //change variable type

// Print type of the changed variable
echo gettype($name). '<br>';

// Variable checking functions
is_string($name); // will be false when checked as we changed)
is_int($age);
is_bool($isMale);
is_double($height);



// Check if variable is defined
echo is_string($name); //doesnt display anything as false bool is an empty string
echo is_int($age. '<br>'); // return 1 true
//is_array

// Constants(need constant name and value )
define('PI', 3.14);
//to print out defined constant
echo PI. '<br>';

// PHP built-in constants
echo SORT_ASC. '<br>'; // 4
echo PHP_INT_MAX. '<br>'; //max int in php
?>
