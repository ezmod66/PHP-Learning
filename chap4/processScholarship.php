<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Form</title>
</head>
<body>
        <?php    
        $firstName = validateInput($_POST['fName'], "first name");
        $lastName = validateInput($_POST['lName'], "Last Name");

        // if($errorCount > 0)
        // {
        //     echo "Please re-enter the information below.<br /> \n";
        //     redisplayForm($firstName,$lastName);
        // }

        $to = "shaun.carrington@overseasam.com";
	    $subject = "scholarship form results";
	    $message = "student name: " .$firstName. " ". $lastName;
	    $results = mail ($to, $subject, $message);
	    
        if($results)
        {
            $resultMsg = "You message was successfully sent.";
        }
        else
        {
            $resultMsg = "There was a problem sending your message.";
        }
        
        function displayRequired($fieldName)
        {
            echo    "The field\"$fieldName\" is required.<br />\n";
        }

        function validateInput($data, $fieldName)
        {
            global $errorCount;
            if(empty($data))
            {
                displayRequired($fieldName);
                ++$errorCount;
                $retval ="";
            }
            else
            {
                $retval = trim($data);
                $retval = stripslashes($retval); 
            }
            return $retval;
        }

        $errorCount = 0;

        function redisplayForm($firstName, $lastName)
        {
            ?>

            <h2 style="text-align: center;"> Scholarship Form</h2>

            <form name="scholarship" action="processScholarship.php" method="POST">
                <p>FirstName: <input type="text" name="fName" value="<?php echo $firstName;?>"></p>
                <p>LastName: <input type="text" name="lName" value="<?php echo $lastName;?>"></p>
                <p><input type="reset" value="Clear Form" />&nbsp;&nbsp; <input type="submit" name="Submit" value="Send Form" /></p>
            </form>
            <?php
        }
        ?>

        <h2 style="text-align: center;">Scholarship Form</h2>
        <p style="line-height: 200%;">Thank you for filling out the scholarship form<?php
        if(!empty($firstName))
        {
            echo ", $firstName";
        }?>.<?php echo $resultMsg; ?></p>
</body>
</html>