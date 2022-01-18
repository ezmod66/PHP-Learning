<?php

function displayRequired($fieldName)
{
    echo    "The field\"$fieldName\" is required.<br />\n";
}

function validateInput($data, $fieldName)
{
    global $errorCount;
    if (empty($data)) {
        displayRequired($fieldName);
        ++$errorCount;
        $retval = "";
    } else {
        $retval = trim($data);
        $retval = stripslashes($retval);
    }
    return $retval;
}


function saveToFile($name, $imgDescription)
{
    $fp = "reunionImg.txt";
    $openFile = fopen($fp, "ab");

    if ($errorCount == 0) {
        if (is_writable("reunionImg.txt")) {
            if (fwrite($openFile, $name . ", " . $imgDescription ."\n")) {
                echo "Successfully uploaded Details\n<br>";
                //clear
                $_POST = array();
                //refresh
            } else {
                echo "cannot save this bug report\n";
            }
        } else {
            echo "<p>Cannot Save to file.</p>\n";
        }
    }
}

function imgSave()
{
    $targetDir = "img/";
    $targetFile = $targetDir . basename($_FILES['imgUpload']['name']);
    $uploadOk = 1;
    $imgFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    //check if file is actual img or fake
    if (isset($_POST['submitbtn'])) {
        $check = getimagesize($_FILES['imgUpload']['tmp_name']);

        if ($check !== false) {
            echo "File is an image - " . $check['mime'] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) 
    {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    //check file size
    if ($_FILES["imgUpload"]["size"] > 500000) 
    {
        echo "Img is too large please change the size and try again";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif")
    {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if($uploadOk == 0) 
    {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } 
    else 
    {
        if(move_uploaded_file($_FILES['imgUpload']['tmp_name'], $targetDir. "/" . $_FILES['imgUpload']['name']) == true)
            {   //change permissions of the file so everyone else can read the file
                chmod($targetDir . "/" . $_FILES['imgUpload']['name'], 0644);
                //feedback on file upload success
                echo "File \"" . htmlentities($_FILES['imgUpload']['name']) . "\"successfully uploaded. <br />\n";
            }
            else
            {   //feedback on file upload failure
                echo "There was an error uploading \"" . htmlentities($_FILES['imgUpload']['name']) . "\".<br />\n";
            }
    }
}
