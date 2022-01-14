<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Guest Book</title>
</head>
<body>
    <?php
    
    if(empty($_POST['first_name']) || empty($_POST['last_name']))
    {
        echo "<p>You must enter your first and last name. Click your browser's Back button to return to the guest book</p>";
    }
    else
    {
        $firstName = addslashes($_POST['first_name']);
        $lastName = addslashes($_POST['last_name']);
        $guestBook = fopen("guestBook.txt", "ab");

        if(is_writeable("guestBook.txt"))
        {
            if(fwrite($guestBook, $lastName . ", " . $firstName . "\n"))
            {
                echo "<p>Thank you for signing our guest book!</p>\n";
            }
            else
            {
                echo "<p>Cannot add your name to the guest book.</p>";
            }
        }
        else
        {
            echo "<p>Cannot write to the file.</p>";
        }
        fclose($guestBook);
    }
    
    ?>
</body>
</html>