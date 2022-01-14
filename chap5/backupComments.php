<!-- Copying files to other directories -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup Comments</title>
</head>
<body>
    <?php
    $source = "comments";
    $destination = "backups";
    //check if backup exists and is dir
    if(!is_dir($destination))
    {
        echo "The backup directory \"$destination\" does not exist.";
    }
    else
    {
        if(is_dir($source))
        {
            $totalFiles = 0;
            $filesMoved = 0;
            $dirEntries = scandir($source);
            foreach($dirEntries as $entry)
            {
                if(($entry !=".") &&($entry != ".."))
                {
                    ++$totalFiles;
                    if(copy("$source/$entry","$destination/$entry"))
                    {
                        ++$filesMoved;
                    }
                    else
                    {
                        echo "Couldnt move file \"" . htmlentities($entry) . "\" . <br>";
                    }
                }
                echo "<p>$filesMoved of $totalFiles comments successfully backed up.</p>";        
            }      
        }
        else
            {
                echo "<p>The source directory \"" . $source . "\" does not exist!</p>";
            }
    }
    ?>
</body>
</html>