<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view comments</title>
</head>
<body>
        <?php 
            //opendir()
            // $dir = "files";
            // $dirOpen = opendir($dir);
            // while ($curfile = readdir($dirOpen))
            // {
            //     if(strcmp($curfile, '.') != 0 && (strcmp($curfile,'..')!= 0)) 
            //     {
            //         echo "<a href=\"$files/" . $curfile . "\">" . $curfile . "</a><br />\n";
            //     }
            //     closedir($dirOpen);
            // }
            // sandir()
            // $dir = "files";
            // $dirEntries = scandir($dir);

            // foreach($dirEntries as $entry)
            // {
            //     if(strcmp($entry, '.') != 0 && (strcmp($entry,'..')!= 0)) 
            //     {
            //         echo "<a href=\"$dir/" . $entry. "\">" . $entry . "</a><br />\n";
            //     }
            // }
                //specify comments directory
            $dir = "comments";
            //scan dir and return
            $dirEntries = scandir($dir);
                //setup of table th
            echo "<table border='1' width='100%'>\n";
            echo "<tr><th colspan='4'>Directory listing for <strong>" . htmlentities($dir) ."</strong></th></tr>\n";
            echo "<tr>";
            echo "<th><strong><em>Name</strong></th>";
            echo "<th><strong><em>Owner ID</strong></th>";
            echo "<th><strong><em>Permissions</strong></th>";
            echo "<th><strong><em>Size</strong></th>\n";
                //loop through dir array by each entry
            foreach($dirEntries as $entry)
            {   
                if((strcmp($entry, '.') != 0) && (strcmp($entry,'..')!= 0)) 
                {
                    $fullEntryName = $dir . "/" . $entry;
                    echo "<tr>
                            <td>";
                    //check if file
                    if(is_file($fullEntryName))
                    {
                        // echo "<a href=\"fileDownloader.php?filename=$entry\">" . htmlentities($entry) . "</a>\n";
                        echo "<a href=\"$fullEntryName\">" . htmlentities($entry) . "</a>";
                    }
                    else
                    {
                        echo htmlentities($entry);
                        echo "</td><td align='center'>" . fileowner($fullEntryName);

                        if(is_file($fullEntryName))
                        {
                            $perms = fileperms($fullEntryName);
                            $perms = decoct($perms % 01000);
                            echo "</td><td align = 'center' 0$perms";
                            echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . " bytes";
                        }
                        else
                        {
                            echo "</td><td colspan='2' align='center'>&lt;DIR&gt;";
                            echo "</td></tr>\n";
                        }
                    }
                }
            }
            echo "</table>\n";
        ?>
</body>
</html>