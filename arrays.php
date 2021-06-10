<?php

// Create array
//$fruits = array(); 
$fruits = ["Bannanna", "Apple", "Orange"];

// Print the whole array
echo '<pre>'; //formats better for readability in browser
var_dump($fruits);
echo '</pre>';

// Get element by index

echo $fruits[0]. '<br>';

// Set element by index
$fruits[0] = 'Peach';

// Check if array has element at index 2
isset($fruits[3]); //false

// Append element
$fruits[] = 'banana';

echo '<pre>'; //formats better for readability in browser
var_dump($fruits);
echo '</pre>';

// Print the length of the array
echo count($fruits). '<br>';

// Add element at the end of the array
array_push($fruits, 'foo');

echo '<pre>'; //formats better for readability in browser
var_dump($fruits);
echo '</pre>';

// Remove element from the end of the array
echo array_pop($fruits);

echo '<pre>'; //formats better for readability in browser
var_dump($fruits);
echo '</pre>';

// Add element at the beginning of the array
array_unshift($fruits, 'bar');

echo '<pre>'; //formats better for readability in browser
var_dump($fruits);
echo '</pre>';

// Remove element from the beginning of the array
array_shift($fruits);

echo '<pre>'; //formats better for readability in browser
var_dump($fruits);
echo '</pre>';

// Split the string into an array
$string = "Bananna,Apple,Peach";
explode(",", $string); //delimeter and the strings to be changed to array

echo '<pre>'; //formats better for readability in browser
var_dump(explode(",", $string));
echo '</pre>';

// Combine array elements into string 
echo implode("&", $fruits);

// Check if element exist in the array
in_array('Apple',$fruits);

echo '<pre>'; 
var_dump(in_array('Apple',$fruits));
echo '</pre>';

//formats better for readability in browser
// Search element index in the array
echo '<pre>'; 
var_dump(array_search('mango',$fruits));
echo '</pre>';

// Merge two arrays
$vegetables = ["potato", "cucumber"];
echo '<pre>'; 
var_dump(array_merge($fruits, $vegetables));
echo '</pre>';

var_dump(...$fruits,...$vegetables);
// Sorting of array (Reverse order also)


// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays*(key value pairs)
// ============================================

// Create an associative array

$person = [
    'name' => 'Brad',
    'surname'=> 'Stevens',
    'age'=> '30',
    'hobbies'=> ['Tennis', 'Video Games'],
];

echo '<pre>'; 
var_dump($person); //print_r
echo '</pre>';

// Get element by key
echo $person['name']. '<br>';

// Set element by key
$person['channel'] = 'TraversyMedia';

// Null coalescing assignment operator. Since PHP 7.4
/*if(!$person['address'])
    {
        $person['address'] = 'unknown';
    }

    $person['address'] ??= 'unknown';
*/
// Check if array has specific key

// Print the keys of the array
echo '<pre>'; 
var_dump(array_keys($person));
echo '</pre>';

// Print the values of the array

echo '<pre>'; 
//var_dump(array_keys($person));
var_dump(array_values($person));
echo '</pre>';

// Sorting associative arrays by values, by keys
asort($person);
echo '<pre>'; 
var_dump($person);
echo '</pre>';

ksort($person);
echo '<pre>'; 
var_dump($person);
echo '</pre>';

/*asort = sort by values. ksort = sort by keys you can also reverse sort them 
with arsort = sort in reverse of values and krsort = reverse sort keys*/

// Two dimensional arrays

$todo = [
    ['title' => 'todo title 1', 'completed' => true],
    ['title' => 'todo title 2', 'completed' => false],
];

echo '<pre>'; 
var_dump($todo);
echo '</pre>';