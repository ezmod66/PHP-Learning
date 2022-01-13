<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hit Counter</title>
</head>
<body>
        <?php
        $counterFile = "hitCounter.txt";

        if(file_exists($counterFile))
        {
            $hits = file_get_contents($counterFile);
            ++$hits;
        }
        else
        {
            $hits = 1;
        }

        echo "<h1>There have been $hits hits to this page.<h1>\n";
        if(file_put_contents($counterFile, $hits))
        {
            echo "<p>The counter file has been updated</p>\n";
        }
        ?>
</body>
</html>