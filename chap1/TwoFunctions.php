<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Functions</title>
</head>
<body>
        <?php

        function displayMessage($firstMessage)
        {
            echo "<p>$firstMessage</p>";
        }

        function returnMessage()
        {
            return "<p>This message was returned from a function</p>";
        }

        displayMessage("This message was displayed from a function.");
        $returnVal = returnMessage();
        echo $returnVal;

        global $time;
        
        ?>
</body>
</html>


