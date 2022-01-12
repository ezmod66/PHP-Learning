<?php

    $dir = "files";
    if(isset($_GET['filename']))
    {
        $filetoget = $dir . "/" . stripslashes($_GET['filename']);
        
        if(is_readable($filetoget))
        {
            header("Content-Description: File Transfer");
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename\"" . $_GET['filename'] . "\"");
            header("Content-Transfer-Encoding: base64");
            header("Content-Length: " . filesize($filetoget));
            readfile($filetoget);
            $showErrorPage = false;
        }
        else
        {
            $errorMsg = "Cannot read \"$filetoget\"";
            $showErrorPage = true;
        }
    }
    else
    {
        $errorMsg = "No filename specified";
        $showErrorPage = true;
    }
    if($showErrorPage) 
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="content-type" content="text/html" charset=iso-8859-1 />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>File Downloader</title>
        </head>
        <body>
            
        
            <p>There was an error Downloading "<?php echo htmlentities($_GET['filename']); ?>"</p>
            <p><?php echo htmlentities($errorMsg); ?></p>
        
        </body>
        </html> 
        <?php 
    }
    ?>
    
    