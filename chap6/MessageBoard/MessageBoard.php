<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
</head>
<body>
    <h1>Message Board</h1>
    <?php
        if((!file_exists("messages.txt")) || (filesize("messages.txt") == 0))
        {
            echo "<p>There are no messages posted.</p>\n";
        }
        else
        {   //fill array from file
            $messageArray = file("messages.txt");
            //table setup
            echo "<table style=\"background-color:lightgray\" border=\"1\" width=\"100%\">\n";
            //count of array
            $count = count($messageArray);

            for($i = 0; $i < $count; ++$i)
            {
                $currMsg = explode("~",$messageArray[$i]);
                echo "<tr>\n";
                echo "<td width=\"5%\" style=\"text-align:center;font-weight:bold;\">" . ($i + 1) . "</td>\n";
                echo "<td width=\"95%\"><span style=\"font-weight:bold\">Subject: </span>" . htmlentities($currMsg[0]). " <br>\n";
                echo "<span style='font-weight:bold'>Name: </span>" . htmlentities($currMsg[1]) . "<br/>\n";
                echo "<span style='text-decoration:underline; font-weight:bold'>Message</span><br/>\n" . htmlentities($currMsg[2]) . "</td>\n";
                echo "</tr>\n";
                
            }
            echo "</table>\n";
        }
    ?>
    <p><a href="PostMessage.php">Post New Message</a></p>
</body>
</html>