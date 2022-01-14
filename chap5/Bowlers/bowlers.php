<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowlers</title>
</head>
<body>
    <?php

        function displayForm()
        {
            ?>
            <h1>Register for Bowling</h1>
            <form action="bowlers.php" method="post">
            <p>Bowler Name: <br><input type="text" name="bowlerName"></p>
            <p>Bowler Age: <br><input type="number" name="bowlerAge"></p>
            <p>Bowler Avg: <br><input type="number" name="bowlerAverage"></p>
            <p><input type="reset" value="Reset">&nbsp;&nbsp;<input type="submit" name="submit" value="Register"></p>
            </form>
            <?php
        }

        if(isset($_POST['submit']))
        {
            if(!empty($_POST['bowlerName'])&& !empty($_POST['bowlerAge']) && !empty($_POST['bowlerAverage']))
            {
                $saveFileName = "bowlers.txt";
                $fp = fopen($saveFileName, "ab");

                if($fp === FALSE)
                {
                    echo "There was an error creating \"" . htmlentities($saveFileName) . "\".<br/>\n";
                }
                else
                    {
                        $name = stripslashes(trim($_POST['bowlerName']));
                        $age = stripslashes(trim($_POST['bowlerAge']));
                        $averageScore= stripslashes(trim($_POST['bowlerAverage']));

                        if(fwrite($fp, $name . ", " . $age .", ". $averageScore. "\n"))
                        {
                            echo "Successfully wrote to file \"" . htmlentities($saveFileName) . "\" . <br/>\n";
                        }
                        else
                        {
                             echo "There was an error writing to file \"" . htmlentities($saveFileName) . "\" . <br/>\n";
                        }
                        fclose($fp);
                    }

            }
        }
        else
        {
           displayForm();
        }
    ?>

</body>
</html>