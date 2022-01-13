<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Volunteers</title>
</head>

<body>
    <h1>Coast City Charity Event Volunteers</h1>

    <?php

    if (isset($_POST['first_name']) && isset($_POST['last_name'])) 
    {
        $volunteerFirst = addslashes($_POST['first_name']);
        $volunteerLast = addslashes($_POST['last_name']);
        $newVolunteer = "$volunteerLast, $volunteerFirst\n";
        $volunteerFile = "volunteers.txt";

        if(file_put_contents($volunteerFile, $newVolunteer, FILE_APPEND) > 0)
        {
            echo "<p>" . stripslashes($_POST['first_name']) .
                " " . stripslashes($_POST['last_name']) . 
                " has been registered to volunteer at the event!</p>\n";
        }
        else
        {
            echo "<p>Registration error!</p>";
        }
    }
    else
    {
        echo "<p>To sign up to volunteer at the event, enter your first and last name and click the Register Button</p>";
    }
    ?>

    <form action="eventVolunteers.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="30"/></p>
    <p>Last Name: <input type="text" name="last_name" size="30"/></p>
    <p><input type="submit" value="Register"></p>
    </form>
</body>

</html>