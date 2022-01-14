<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Guest Book</title>
</head>
<body>

    <?php
        $fp = "guestBook.txt";
        //check if dir or file exists
        if(file_exists($fp))
        {
            if(is_readable($fp))
            {
                echo "<pre>";
                echo readfile($fp). "<br>";
                echo "</pre>";
            }
            else
            {
                echo "File not readable. ";
            }
        }
        else
        {
            echo "File \"" . $fp . " was not found or doesn't exist";
        }
        //use readfile() to display contents of file

        //<pre> <hr> inbetween entries in the file.

    ?>
</body>
</html>