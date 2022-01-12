<?php

    $dir = "files";
    //check if file name set
    if(isset($_GET['filename']))
    {   //get file from directory and remove / etc
        $filetoget = $dir . "/" . stripslashes($_GET['filename']);
        //check if exists the file
        if(is_readable($filetoget))
        {   //header for downloading with file name encoding and file size
            header("Content-Description: File Transfer");
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename\"" . $_GET['filename'] . "\"");
            header("Content-Transfer-Encoding: base64");
            header("Content-Length: " . filesize($filetoget));
            readfile($filetoget);
            $showErrorPage = false;
        }
        else
        {   //cant find find name selected
            $errorMsg = "Cannot read \"$filetoget\"";
            $showErrorPage = true;
        }
    }
    else
    {   //error no file selected
        $errorMsg = "No filename specified";
        $showErrorPage = true;
    }
    if($showErrorPage) 
    {   //show error 
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
    
    