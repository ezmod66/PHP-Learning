<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Form</title>
</head>
<body>
    <?php 
    
    $displayForm = true;
    $number = "";

    if(isset($_POST['Submit']))
    {
        $number = $_POST['number'];

        if(is_numeric($number))
        {
            $displayForm = false;
        }
        else
        {
            echo "<p>You need to enter a numeric value.</p>\n";
            $displayForm = true;
        }
    }

    if($displayForm)
    {
        ?>
        <form name="numberForm" action="numberForm.php" method="POST">
        <p>Enter a number: <input type="text" name="number" value="<?php echo $number;?>" /></p>
        <p><input type="reset" value="Clear Form" />&nbsp;&nbsp; <input type ="submit" name="submit" value="Send Form"> </p>
        </form>
        <?php
    }
    else
    {
        echo "<p>Thank you for entering a number.</p>\n";
        echo "<p>Your number, $number, squared is " . ($numer * $number)."</p>";
        echo "<p><a href=\"NumberForm.php\"></p>\n";
    }
    
    ?>
</body>
</html>