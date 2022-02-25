<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Message</title>
</head>
<body>  
    <?php
        if(isset($_POST['submit']))
        {
            //remove any quoted strings
            $subject = stripslashes($_POST['subject']);
            $name = stripslashes($_POST['name']);
            $message = stripslashes($_POST['message']);
            //replacying ~ with - in original message
            $subject = str_replace("~","-", $subject);
            $name = str_replace("~","-", $name);
            $message = str_replace("~","-", $message);

            $ExistingSubjects = array();
            if(file_exists("messages.txt") && filesize("messages.txt") > 0)
            {
                $MessageArray = file("messages.txt");
                $count = count($MessageArray);

                for( $i = 0; $i < $count; ++$i)
                {
                    $CurrMsg = explode("~", $MessageArray[$i]);
                    $ExistingSubjects[] = $CurrMsg[0];
                }
            }
            if(in_array($subject, $ExistingSubjects))
            {
                echo "<p>The subject you entered already exists! <br/> \n";
                echo "Please enter a new subject and try again. <br /> \n";
                echo "Your message was not saved. </p>";
                $subject = "";
            }
            else
            {
                //message format for saving to file
                $messageRecord =  "$subject~$name~$message\n";
                $messageFile = fopen("messages.txt","ab");
            
                if($messageFile === false)
                {
                    echo "There was an error saving your message!\n";
                }
                else
                {
                    fwrite($messageFile, $messageRecord);
                    fclose($messageFile);
                    echo "Your message has been saved.\n";
                    $subject = "";
                    $message = "";
                }
            }
        }
        else 
        {
            $subject = "";
            $name = "";
            $message = "";
        }
    ?>

    <h1>Post New Message</h1>
    <hr>
    <form action="PostMessage.php" method="post">
        <span style="font-weight: bold;">Subject:
            <input type="text" name="subject" value="<?php echo $subject ?>"></span>
        
        <span style="font-weight: bold;">Name:
            <input type="text" name="name" value="<?php echo $name ?>"></span><br/>

        <textarea name="message" cols="80" rows="6"><?php $message ?></textarea><br/>
        <input type="reset" name="reset" value="Reset Form">&nbsp;&nbsp;<input type="submit" name="submit" value="Post Message">
    </form>
    <hr>
    <p><a href="MessageBoard.php">View Messages</a></p>
</body>
</html>