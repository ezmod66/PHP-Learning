<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Comments</title>
</head>
<body>
    <?php 
        //specify comments directory
        $dir = "comments";
        //check if directory
        // if(is_dir($dir))
        // {   //check if form submitted
        //     if(isset($_POST['save']))
        //     {   //check if name entered
        //         if(empty($_POST['name']))
        //         {
        //             $savingString = "unknown Visitor\n";
        //         }
        //         else
        //         {   //remove unessessary things in string + add date + comment
        //             $saveString = stripslashes($_POST['email']) . "\n";
        //             $saveString .= date('r') . "\n";
        //             $saveString .= stripslashes($_POST['comment']);
        //             //get current time stamp
        //             $CurrentTime = microtime();
        //             //change to array with " "
        //             $timeArray = explode(" ", $CurrentTime);
        //             $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
        //             //file name is comment.seconds.microseconds.txt
        //             $saveFileName = "$dir/comment.$timeStamp.txt";
        //             //add info to file
        //             if(file_put_contents($saveFileName,$saveString)>0)
        //             {
        //                 echo "File \"" . htmlentities($saveFileName) .  "\" . <br />\n";
        //             }

        //         }
        //     }
        // }
        // fwrite fclose()
        // $saveFileName = "comments";
        // $fp = fopen($saveFileName, "wb");

        // if($fp === FALSE)
        // {
        //     echo "There was an error creating \"" . htmlentities($saveFileName) . "\".<br/>\n";
        // }
        // else
        // {
        //     if(fwrite($fp, $SavingString)>0)
        //     {
        //         echo "Successfully wrote to file \"" . htmlentities($saveFileName) . "\" . <br/>\n";
        //     }
        //     else
        //     {
        //         echo "There was an error writing to file \"" . htmlentities($saveFileName) . "\" . <br/>\n";
        //     }
        //     fclose($fp);
        // }

        // adding flock() to file usage
        $saveFileName = "comments";
        $fp = fopen($saveFileName,"wb");
        if($fp === false)
        {
            echo "there was an error creating \"" . htmlentities($saveFileName) . "\".<br/>";
        }
        else
        {
            if(flock($fp, LOCK_EX))
            {
                if(fwrite($fp, $saveString) > 0 )
                {
                    echo "successfully wrote to file \"". htmlentities($saveFileName) . "\".<br>";
                }
                else
                {
                    echo "there was a error writing to file \"". htmlentities($saveFileName) . "\". <br>";
                    flock($fp, LOCK_UN);
                }
            }
            else
            {
                echo "There was an " . "error locking file\"" . htmlentities($saveFileName) . " for writing\"."."<br>";
            }
            fclose($fp);
        }
    ?>

    <h2>Visitor Comments</h2>

    <form action="visitorComments.php" method="post">
        <p>Your Name: <input type="text" name="name" /></p>
        <p>Your Email: <input type="email" name="email" id=""></p>
        <p><textarea name="comment" id="" cols="100" rows="6"></textarea></p>
        <p><input type="submit" name="save" value="Submit your comment"></p>
    </form>
</body>
</html>