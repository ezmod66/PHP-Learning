<?php
// Magic constants change their value depending on exewcution context
echo __DIR__.'<br>'; //directory
echo __FILE__.'<br>';// current file


echo __LINE__.'<br>';// current line 5

// Create directory
//mkdir('test');

// Rename directory
//rename('test', 'test2');

// Delete directory
//rmdir('test2');

// Read files and folders inside directory
$files = scandir('../'); // ../ all files and folder in parent
echo '<pre>';
var_dump($files);
echo '</pre>';

// file_get_contents, file_put_contents
echo file_get_contents('lorem.txt');
file_put_contents('sample.txt','some constant');

// file_get_contents from URL
//$usersJason = file_get_contents('https://jsonplaceholder.typicode.com/users');

//echo '<pre>';
//echo $usersJason;
//echo '</pre>';

//$users = json_decode($usersJason, true);
//echo '<pre>';
//var_dump($users);
//echo '</pre>';
// https://www.php.net/manual/en/book.filesystem.php

// file_exists
file_exists('sample.txt'); 

// is_dir
is_dir('test');

// filemtime
echo fileatime('sample.txt');
// filesize

// disk_free_space
echo disk_free_space('fs');

// file
$sampleText = file('lorem.txt');
echo $sampleText;