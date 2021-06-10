<?php

// Function which prints "Hello I am Shaun"
/*
function hello()
{
    echo "Hello i am Shaun";
}

hello();
hello();
hello();
*/
// Function with argument

/*
function Hello($name) 
{
    echo "Hello i am $name";
}
hello('Shaun');
hello('STeven');
*/
//With return
function Hello($name) 
{
    return "Hello i am $name";
}
echo hello('Shaun') .'<br>';
echo hello('Steven') .'<br>';

// Create sum of two functions
function sum($a, $b){
    return $a + $b;
}
//echo sum(4,5);

// Create function to sum all numbers using ...$nums
/*function sum2(...$nums){ //save all the given values into an array
    
    $tot = 0;
    foreach($nums as $num)
    {
        $tot += $num ;
    };
    return $tot;
}
echo sum2(1,2,3,4,5,6);
*/
// Arrow functions
function sum2(...$nums){ 
    //on first iteration calls given function for each element. 
    //passes first element as a carry and the scond element 
    //and n we take both and return sum.
    array_reduce($nums, fn($carry, $n) =>$carry +$n);
}
echo sum2(1,2,3,4,5,6);