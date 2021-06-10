<?php

// Declaring numbers
 $a = 5;
 $b = 4;
 $c = 1.2;

// Arithmetic operations

echo ($a + $b) * $c .'<br>';;
echo $a - $b . '<br>';
echo $a * $b . '<br>';
echo $a / $b . '<br>';
echo $a % $b . '<br>';

// Assignment with math operators
 $a +=  $b; echo $a .'<br>';
 echo $a -= $b . '<br>';
 echo $a *= $b . '<br>';
 echo $a /= $b . '<br>';
 echo $a %= $b . '<br>';

// Increment operator
$a++; // print a then add +1
++$a; // +1 then print a

// Decrement operator

echo $a--;
echo --$a;

// Number checking functions

is_float(1.25);
is_double(1.25);
is_integer(5);
is_numeric("3.45"); //true
is_numeric("3g.45");

// Conversion

$strNumber = '12.34';
$number = (int)$strNumber;
var_dump ($number);

echo "<br>";
// Number functions
echo "abs(-15)" .abs(-15). '<br>';
echo "pow(2,3)" . pow(2,3). '<br>';
echo "sqrt(16)" . sqrt(16). '<br>';
echo  "max(2,3)". max(2,3). '<br>';
echo "min(2,3)" . min(2,3). '<br>';
echo "round(2.4)". round(2.4). '<br>';
echo "round(2.6)" . round(2.6). '<br>';
echo "floor(2.6)" . floor(2.6). '<br>';
echo "ceil(2.4)" . ceil(2.4). '<br>';

// Formatting numbers
$number = 123456789.12345;
echo number_format($number, 2, ',',' ');

// https://www.php.net/manual/en/ref.math.php
