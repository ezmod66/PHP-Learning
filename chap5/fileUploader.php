<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file Uploader</title>
</head>
<body>
        <?php 
        //specify directory to upload to
        $dir = "files";
        //check if form sumission from the submit btn
        if(isset($_POST['upload']))
        {   //store in temp dir
            if(move_uploaded_file($_FILES['new_file']['tmp_name'], $dir. "/" . $_FILES['new_file']['name']) == true)
            {   //change permissions of the file so everyone else can read the file
                chmod($dir . "/" . $_FILES['new_file']['name'], 0644);
                //feedback on file upload success
                echo "File \"" . htmlentities($_FILES['new_file']['name']) . "\"successfully uploaded. <br />\n";
            }
            else
            {   //feedback on file upload failure
                echo "There was an error uploading \"" . htmlentities($_FILES['new_file']['name']) . "\".<br />\n";
            }
        }
        ?>

        <form action="fileUploader.php" method="post" enctype="multipart/form-data">
            <p><input type="hidden" name="MAX_FILE_SIZE" value="25000"/></p>
            <p>File To upload:<br /> <input type="file" name="new_file" /><br />(25,000 byte limit)</p>
            <p> <input type="submit" name="upload" value="Upload the File"></p>
        </form>
</body>
</html>