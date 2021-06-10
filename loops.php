<?php

// while
//while (true){
//
//}

// Loop with $counter
$counter = 0;
//while($counter < 10) {
//    echo $counter++. '<br>';
//    if ($counter === 5){
 //       break;
 //   }
//}

// do - while print value then check value
//do {
//    echo $counter. '<br>';
//    $counter++;
//}while ($counter < 10);

// for
for($i = 0; $i < 10; $i++){
    echo $i. '<br>';
}

// foreach
$fruits = ["Bannanna", "Apple", "Orange"];
foreach($fruits as $i => $fruit) {
    echo $i. ' '.$fruit. '<br>';
}

// Iterate Over associative array.
$person = [
    'name' => 'Brad',
    'surname'=> 'Stevens',
    'age'=> '30',
    'hobbies'=> ['Tennis', 'Video Games'],
];
//for each person object in array as key(name) and value(brad)
//if object is array in the value above print the key, implode to string with delimeter , and the value
//else just print they key and value
foreach($person as $key =>$value){
    if(is_array($value)) {
        echo $key. ' '. implode(",",$value). '<br>'; 
    }
    else {
        echo $key. ' '. $value .'<br>';
    }
    
}
