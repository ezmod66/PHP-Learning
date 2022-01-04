<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books And Authors</title>
</head>
<body>
    <?php

    $books = array("The Adventures of Huckleberry Finn",
                   "Nineteen Eighty-Four",
                   "Alice's Adventures in Wonderland",
                   "The cat in the Hat");

    $authors = array("Mark Twain",
                     "George Orwell",
                     "Lewis Carroll",
                     "Dr. Seuss");
    
    $realNames = array("Smamuel Clemens",
                       "Eric Blair",
                       "Charles Dodson",
                       "Theodor Geisel");

    for($i = 0; $i <count($books); ++$i)
    {
        echo    "<p>The real name of {$authors[$i]},". 
                "The author of \"{$books[$i]}\", ". 
                "is {$realNames[$i]}.</p>";
    }

    ?>
</body>
</html>