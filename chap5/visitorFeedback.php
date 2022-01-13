
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
    
    if(is_dir($dir))
    {
        $commentFile = scandir($dir);

        foreach($commentFile as $fileName)
        {
            if(($fileName != ".") && ($fileName != ".."))
            {
                echo "From <strong> $fileName </strong><br>";
               
                $comment = file($dir . "/" . $fileName);
                echo "From: " . htmlentities($comment[0]). "<br>\n";
                echo "Email Address: " . htmlentities($comment[1]) . "<br /> \n";
                echo "Date: " . htmlentities($comment[2]) . "<br/>\n";
                $commentLines = count($comment);
                echo "Comment:<br/>\n";

                for($i = 3; $i < $CommentLine; ++$i)
                {
                    echo htmlentities($comment[$i]) . "<br/>\n";
                }
                echo "<hr/>\n";
            }
        }
    }
    ?>
</body>
</html>