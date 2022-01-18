<?php
    /**Capture name, description of img, 
     * file upload of image. 
     * Save to img folder inside highSchoolReunion,
     * save img desc and name of person to a .txt 
     * Thank user for participating.*/
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "processing.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylez.css">
    <title>High School Reunion</title>
</head>
<body>
    <h1>High School Reunion Image Upload</h1>
    <div class="container">

    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>Enter Name:</p>
        <p><input type="text" name="name"></p>
        <p>Enter Image Description:</p>
        <p><textarea name="imgDescription" id="imgDescription" cols="30" rows="10"></textarea></p>
        <p>Select Image to Upload:</p>
        <p><input type="hidden" name="MAX_FILE_SIZE" value="25000"/></p>
        <p><input type="file" name="imgUpload" id="imgUpload"/><br />(25,000 byte limit)</p>
        
        <p><input type="submit" value="Upload" name="submitbtn"></p>
    </form>
    </div>
    
    <?php

        if(isset($_POST['submitbtn']))
        {
            $name = validateInput($_POST['name'], "Person Name");
            $imgDescription = validateInput($_POST['imgDescription'], "imgDescription");

            saveToFile($name, $imgDescription);

            imgSave();
            

        }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>