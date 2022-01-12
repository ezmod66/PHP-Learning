<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Files</title>
</head>
<body>
        <?php 
        
            $dir = "files";
            $dirOpen = opendir($dir);
            while ($curfile = readdir($dirOpen))
            {
                if(strcmp($curfile, '.') != 0 && (strcmp($curfile,'..')!= 0)) 
                {
                    echo "<a href=\"$files/" . $curfile . "\">" . $curfile . "</a><br />\n";
                }
                closedir($dirOpen);
            }
        
        ?>
</body>
</html>