<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musical Scale</title>
</head>
<body>
    <?php

    $outputString = "The notes of the musical scale are: ";
    $musicalScale = array("do", "re", "mi", "fa", "so", "la", "ti");

    foreach($musicalScale as $musicalNote)
    {
        $outputString .= " " . $musicalNote;
    }

    echo "<p> $outputString</p>";

    ?>
</body>
</html>