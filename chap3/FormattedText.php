<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatted Text</title>
</head>
<body>
    <?php

    $displayValue = 9.876;

    echo    "<pre>\n";
    echo    "Unformatted text line 1. ";
    echo    "Unformatted text line 2. ";
    echo    "$displayValue =  $displayValue";
    echo    "</pre>\n";
    
    echo    "<pre>\n";
    echo    "formatted text line 1. \r\n";
    echo    "\tformatted text line 2. \r\n";
    echo    "\$displayValue =  $displayValue";
    echo    "</pre>\n";

    ?>
</body>
</html>