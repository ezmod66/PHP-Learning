<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presidents</title>
</head>
<body>
    <?php

    $presidents = array("George Washington", "John Adams", "Thomas Jefferson", "James Madison", "James Monroe");
    $yearsInOffice = array("1789-1797", "1797-1801", "1901-1908", "1809-1817", "1817-1825");

    $outPutTemplate = "<p> President [NAME] served from [TERM]</p>";

    foreach($presidents as $sequence=>$name)
    { //use the str_replace search term, name, temp to replace in and assign it to the temp string
        $tempString = str_replace("[NAME]", $name, $outPutTemplate);
        //replace term, replacement string, temp string previously used,
        $outputString = str_replace("[TERM]", $yearsInOffice[$sequence], $tempString);
        //print it out now
        echo $outputString;
    }
    
    ?>
</body>
</html>