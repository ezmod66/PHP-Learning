<?php

// Create simple string
$name = "Shaun";
$string = 'Hello, I am '.$name .' I am 28';
$string2 = "Hello, I am $name. I am 28 ";

echo $string. '<br>';
echo $string2. '<br>';

// String concatenation
echo 'Hello'.'World'.'PHP'. '<br>';

// String functions
$string = "      Hello World      ". '<br>';
//can see trims in page source
echo "1 - ". strlen($string) . '<br>'; //string length
echo "2 - ". trim($string) . '<br>'; // remove white space of begginning and end of string
echo "3 - ". ltrim($string) . '<br>'; //left trim. remove white spaces from left side of string
echo "4 - ". rtrim($string) . '<br>';// right trim
echo "5 - ". str_word_count($string) . '<br>'; // word count
echo "6 - ". strrev($string) . '<br>'; 
echo "7 - ". strtoupper($string) . '<br>';
echo "8 - ". strtolower($string) . '<br>';
echo "9 - ". ucfirst('hello'). '<br>'; //upper case first
echo "10 - ". strpos($string,'world'). '<br>'; //search word inside string comes back with nothing as upper case in string
echo "11 - ". ucwords('hello world'). '<br>'; 
echo "12 - ". strpos($string,'world'). '<br>';
echo "13 - ". stripos($string, 'world'). '<br>'; //ignore case when looking for a word.
echo "14 - ". substr($string, 8). '<br>'; //take out string from position 8
echo "15 - ". str_replace('World','php', $string). '<br>'; //replace word with specified word in string
echo "16 - ". str_ireplace('world','php', $string). '<br>'; //ignores case sensative

// Multiline text and line breaks

$longText = "Hello, my name is Shaun
            I am 27,
            I love my daughter
            ";

            echo $longText.'<br>';
            echo nl2br($longText).'<br>'; //keeps line breaks which you have in string

// Multiline text and reserve html tags



// https://www.php.net/manual/en/ref.strings.php