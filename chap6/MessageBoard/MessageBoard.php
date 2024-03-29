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
    
    if(isset($_GET['action']))
    {
        if((file_exists("messages.txt") && (filesize("messages.txt") != 0)))
        {
            $messageArray = file("messages.txt");

            switch($_GET['action'])
            {
                case 'Delete First':
                    array_shift($messageArray);
                        break;
                case 'Delete Last':
                    array_pop($messageArray);
                        break;
                case 'Delete Message';
                    if(isset($_GET['message']))
                        $index = $_GET['message'];
                        unset($messageArray[$index]);
                        $messageArray = array_values($messageArray);
                        break;
                case 'Remove Duplicates':
                        $messageArray = array_unique($messageArray);
                        $messageArray = array_values($messageArray);
                        break;
                case 'Sort Ascending' :
                        sort($messageArray);
                        break;
                case 'Sort Descending' :
                        rsort($messageArray);
                        break;
            }

            if(count($messageArray) > 0)
            {
                $newMessages = implode($messageArray);
                $messageStore = fopen("messages.txt","wb");

                if($messageStore === false)
                {
                    echo "There was an error updating the message file\n";
                }
                else
                {
                    fwrite($messageStore,$newMessages);
                    fclose($messageStore);
                }
            }
            else
            {
                unlink("messages.txt");
            }
        }
    }

        // check if file exists and there is content inside
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

            foreach($messageArray as $message)
            {
                $currMsg = explode("~", $message);
                $keyMessageArray[] = $currMsg;
            }
            // for($i = 0; $i < $count; ++$i)
            // {
            //     $currMsg = explode("~", $messageArray[$i]);
            //     $keyArray[] = $currMsg[0];
            //     $valueArray[] = $currMsg[1] . "~" . $currMsg[2];
            //     $KeyMessageArray = array_combine($keyArray, $valueArray); 
            // }

            // $Index = 1;
            // $key = key($KeyMessageArray);

            // echo "<pre>\n";
            // print_r($keyArray);
            // echo "</pre>\n";
                for($i = 0; $i < $count; ++$i)
                {
                    echo "<tr>\n";
                    echo "<td width=\"5%\" style=\"text-align:center;font-weight:bold;\">" . ($i + 1) . "</td>\n";
                    echo "<td width=\"85%\"><span style=\"font-weight:bold\">Subject: </span>" . htmlentities($keyMessageArray[$i][0]). " <br>\n";
                    echo "<span style='font-weight:bold'>Name: </span>" . htmlentities($keyMessageArray[$i][1]) . "<br/>\n";
                    echo "<span style='text-decoration:underline; font-weight:bold'>Message</span><br/>\n" . htmlentities($keyMessageArray[$i][2]) . "</td>\n";
                    echo "<td width=\"10%\" style=\"text-align:center\">" . 
                            "<a href='MessageBoard.php?" . 
                            "action=Delete%20Message&" .
                            "message=" . $i . 
                            "'>Delete This Message</a></td>\n";
                            echo "</tr>\n";
                }

            // foreach($KeyMessageArray as $Message)
            // {
            //     $currMsg = explode("~", $Message);

            //     echo "<tr>\n";
            //     echo "<td width=\"5%\" style=\"text-align:center;font-weight:bold;\">" . $Index . "</td>\n";
            //     echo "<td width=\"85%\"><span style=\"font-weight:bold\">Subject: </span>" . htmlentities($key[$Index]). " <br>\n";
            //     echo "<span style='font-weight:bold'>Name: </span>" . htmlentities($currMsg[0]) . "<br/>\n";
            //     echo "<span style='text-decoration:underline; font-weight:bold'>Message</span><br/>\n" . htmlentities($currMsg[1]) . "</td>\n";
            //         echo "<td width=\"10%\" style=\"text-align:center\">" . 
            //                 "<a href='MessageBoard.php?" . 
            //                 "action=Delete%20Message&" .
            //                 "message=" . ($Index - 1) . 
            //                 "'>Delete This Message</a></td>\n";
            //         echo "</tr>\n";
            //         ++$Index;
            //         $Key = key($KeyMessageArray);
            //         next($KeyMessageArray);
            // }
            // for($i = 0; $i < $count; ++$i)
            // {
            //     $currMsg = explode("~",$messageArray[$i]);
            //     echo "<tr>\n";
            //     echo "<td width=\"5%\" style=\"text-align:center;font-weight:bold;\">" . ($i + 1) . "</td>\n";
            //     echo "<td width=\"85%\"><span style=\"font-weight:bold\">Subject: </span>" . htmlentities($currMsg[0]). " <br>\n";
            //     echo "<span style='font-weight:bold'>Name: </span>" . htmlentities($currMsg[1]) . "<br/>\n";
            //     echo "<span style='text-decoration:underline; font-weight:bold'>Message</span><br/>\n" . htmlentities($currMsg[2]) . "</td>\n";
            //     echo "<td width=\"10%\" style=\"text-align:center\">" . 
            //             "<a href='MessageBoard.php?" . 
            //             "action=Delete%20Message&" ."message=$i'>" .
            //             "Delete This Message</a></td>\n";
            //     echo "</tr>\n";
                
            // }
            echo "</table>\n";
        }
    ?>
    <p>
        <a href="PostMessage.php">Post New Message</a><br/>
        <a href="MessageBoard.php?action=Sort%20Ascending">Sort Subjects A-Z</a><br>
        <a href="MessageBoard.php?action=Sort%20Descending">Sort Subjects Z-A</a><br>
        <a href="MessageBoard.php?action=Remove%20Duplicates">Remove Duplicate Messages<br></a>
        <a href="MessageBoard.php?action=Delete%20First">Delete First Mesage</a><br/>
        <a href="MessageBoard.php?action=Delete%20Last">Delete Last Message</a>

    </p>
</body>
</html>