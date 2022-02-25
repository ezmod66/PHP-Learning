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
            }
        }
    ?>

    <h1>Post New Message</h1>
    <hr>
    <form action="PostMessage.php" method="post">
        <span style="font-weight: bold;">Subject:
            <input type="text" name="subject"></span>
        
        <span style="font-weight: bold;">Name:
            <input type="text" name="name"></span><br/>

        <textarea name="message" cols="80" rows="6"></textarea><br/>
        <input type="reset" name="reset" value="Reset Form">&nbsp;&nbsp;<input type="submit" name="submit" value="Post Message">
    </form>
    <hr>
    <p><a href="MessageBoard.php">View Messages</a></p>
</body>
</html>