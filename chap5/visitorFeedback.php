
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Feedback</title>
</head>
<body>

<h2>Visitor Feedback</h2>
    <hr>
    <?php
    $dir = "comments";
    
    // if(is_dir($dir))
    // {
    //     $commentFiles = scandir($dir);

    //     foreach($commentFiles as $fileName)
    //     {
    //         if(($fileName != ".") && ($fileName != ".."))
    //         {
    //             echo "From <strong> $fileName </strong><br>";
               
    //             $comment = file($dir . "/" . $fileName);
    //             echo "From: " . htmlentities($comment[0]). "<br>\n";
    //             echo "Email Address: " . htmlentities($comment[1]) . "<br /> \n";
    //             echo "Date: " . htmlentities($comment[2]) . "<br/>\n";
    //             $commentLines = count($comment);
    //             echo "Comment:<br/>\n";

    //             // var_dump($comment);
    //             for($i = 3; $i < $commentLines; ++$i)
    //             {
    //                 echo htmlentities($comment[$i]) . "<br/>\n";
    //             }
    //             echo "<hr/>\n";
    //         }
    //     }
    // }

    if(is_dir($dir))
    {
        $commentFiles = scandir($dir);

        foreach($commentFiles as $fileName)
        {
            if(($fileName != ".") && ($fileName != ".."))
            {
                echo "From <strong> $fileName </strong><br>";
               
                $fp = fopen($dir . "/" . $fileName, "rb");

                if($fp === false)
                {
                    echo "There was an error reading file \"" . $fileName . "\" . <br>";
                }
                else
                {
                    // echo "From <strong> $fileName</strong> <br>";
                    $from = fgets($fp);
                    echo "From: " . htmlentities($from) . "<br>";
                    $email = fgets($fp);
                    echo "Email Address: " . htmlentities($email). "<br>";
                    $date = fgets($fp);
                    echo "Date: " . htmlentities($date) ."<br>";
                    echo "comment: <br>";
                    $comment = "";

                    while(!feof($fp))
                    {
                        $comment .= fgets($fp);
                    }
                    echo htmlentities($comment) . "<br>";
                    echo "<hr />";

                    fclose($fp);
                }
            }
        }
    }
    ?>
</body>
</html>