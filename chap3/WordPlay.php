<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Play</title>
</head>
<body>
    <?php

    $startingText =  "mAdAm, i'M aDaM.";

    $upperCaseText = strtoupper($startingText);
    $lowerCaseText = strtolower($startingText);
    echo "<p>$upperCaseText</p>\n";
    echo "<p>$lowerCaseText</p>\n";

    echo "<p>" . ucfirst($lowerCaseText) . "</p>\n";
    echo "<p>" . lcfirst($upperCaseText) . "</p>\n";
    $workingText = ucwords($lowerCaseText);
    echo "<p>$workingText</p>\n";

    echo "<p>" . md5($workingText) . "</p>\n";
    echo "<p>" . substr($workingText,0,6) . "</p>\n";
    echo "<p>" . substr($workingText,7) . "</p>\n";
    echo "<p>" . strrev($workingText) . "</p>\n";
    echo "<p>" . str_shuffle($workingText) . "</p>\n";
    
    ?>
</body>
</html>