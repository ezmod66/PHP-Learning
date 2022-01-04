<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title Info</title>
</head>

<body>
    <?php

    $books = array(
        "The Adventures of Huckleberry Finn",
        "Nineteen Eighty-Four",
        "Alice's Adventures in Wonderland",
        "The cat in the Hat"
    );

    for ($i = 0; $i < count($books); ++$i) {
        echo    "<p>The Title of \"{$books[$i]}\" contains " .
            strlen($books[$i]) . " chatacters and  " .
            str_word_count($books[$i])." words.</p>";
    }


    ?>
</body>

</html>