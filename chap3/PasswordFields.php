<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Fields</title>
</head>
<body>
    <?php

    $record = "jhdoe:8w4dS03a39YK2:1463:24:JohnDoe:/home/jdoe:/bin/bash";

    $passwordfields = array("login name", 
                            "optional encrypted password", 
                            "numerical user ID", 
                            "numerical group ID", 
                            "user name or comment field", 
                            "user home directory", 
                            "optinonal user command interpreter");
    
    $fieldIndex = 0;
    $extraFields = 0;
    $currField = strtok($record, ":");
    $fields = explode(":", $record);

    echo "<hr>";
    echo "<p>Exploded</p>";
    echo "<hr>";
    foreach($fields as $fieldIndex=> $fieldValue)
    {
        if($fieldIndex < count($passwordfields))
        {
            echo "<p>The {$passwordfields[$fieldIndex]} is <em>$currField</em></p>\n";
        }
        else
        {
            ++$extraFields;
            echo "<p>Extra field # $extraFields is <em>$currField</em></p>\n";
        }
    }

    echo "<hr>";
    echo "<p>Token</p>";
    echo "<hr>";

    while($currField != null)
    {
        if($fieldIndex < count($passwordfields))
        {
            echo "<p>The {$passwordfields[$fieldIndex]} is <em>$currField</em></p>\n";
        }
        else
        {
            ++$extraFields;
            echo "<p>Extra field # $extraFields is <em>$currField</em></p>\n";
        }
        $currField = strtok(":");
        ++$fieldIndex;
    }


    ?>
</body>
</html>