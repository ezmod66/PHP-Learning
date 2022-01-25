<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
</head>

<body>
    <?php

    function validateInput($data, $fieldName)
    {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field. <br />\n";
            ++$errorCount;
            $retVal = "";
        } else {
            $retVal = trim($data);
            $retVal = stripslashes($retVal);
        }
        return $retVal;
    }

    function validateEmail($data, $fieldName)
    {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field. <br/> \n";
            ++$errorCount;
            $retVal = "";
        } else {
            $retVal = trim($data);
            $retVal = stripslashes($retVal);
            $pattern = "/^[\w-]+(\.[\w-]+)*@" . "[\w-]+(\.[\w-]+)" . "(\.[a-z]{2,})$\i";
            if (preg_match($pattern, $retVal) == 0) {
                echo "\"$fieldName\" is not a valid email address. <br />\n";
                ++$errorCount;
            }
        }
        return $retVal;
    }

    function displayForm($sender, $email, $subject, $message)
    {
    ?>
        <h2 style="text-align:center">Contact Me</h2>
        <form name="contact" action="ContactForm.php" method="POST">
            <p>Your Name: <input type="text" name="sender" value="<?php echo $sender; ?>" /></p>
            <p>Your Email: <input type="text" name="email" value="<?php echo $email; ?>" /></p>
            <p>Subject: <input type="text" name="subject" value="<?php echo $subject; ?>" /></p>
            <p>Message:<br /></p>
            <textarea name="message"><?php echo $message; ?></textarea>
            <p><input type="reset" value="Clear Form" />&nbsp;&nbsp;<input type="submit" name="submit" value="Send Form" /></p>
        </form>
    <?php
    }

    $showForm = TRUE;
    $errorCount = 0;
    $sender = "";
    $email = "";
    $subject = "";
    $message = "";

    if (isset($_POST["submit"])) {
        $sender = ValidateInput($_POST['sender'], "Your Name");
        $email = validateEmail($_POST['message'], "Your Email");
        $subject = validateInput($_POST['subject'], "Subject");
        $message = validateInput($_POST['message'], "Message");

        if ($errorCount == 0) {
            $showForm = false;
        } else {
            $showForm = true;
        }
    }
    
    if($showForm == true)
    {   
        if($errorCount >0)
        {
            echo "<p>Please  re-enter the form information below.</p>\n";
            displayForm($sender,$email,$subject,$message);
        }
    }
    else
    {
        $senderAddress = "$sender <$email>";
        $header = "From: $senderAddress\ncc:$senderAddress\n";
        $result = mail("ezmod66@gmail.com", $subject, $message, $header);

        if($result)
        {
            echo "<p>Your message has been sent. Thank you, ".$sender.".</p>\n";
        }
        else
        {
            echo "<p>There was an error sending your message, ".$sender ."</p>\n";
        }
    }

    ?>
</body>

</html>