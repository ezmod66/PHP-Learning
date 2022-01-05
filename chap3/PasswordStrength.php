<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Strength</title>
</head>
<body>
    <!-- strong password = 1 numeric 1 lower case 1 upper case no space and atleast one special character. between 8-16 chatacters long.-->

    <?php

        $passwords = array("Hell0@123" ,"passWord10", "March2069", "P@55w0rd1O023", "password1", "hand gel", "sys@dmin89JJ", "@ll%245@%*&&", "closeWindow44", "55sdac@av", "asdd", );

        foreach($passwords as $password)
        {
            echo "<hr>";
            echo $password . "<hr>";
            if(strlen($password >= 8 && strlen($password) <= 16))
            {   //contains numeric
                if(preg_match("/[0-9]/",$password) !== 1)
                {
                    echo "Add a numeric to your password. <br>";
                }
                //special character
                if(preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password) !== 1)
                {
                    echo "Add a special character to your Password.<br>";
                }

                //lower case
                if(preg_match("/[a-z]/",$password) !== 1)
                {
                    echo "You need to add a lower case.<br>";
                }

                //uppercase
                if(preg_match("/[A-Z]/",$password) !== 1)
                {
                    echo "add a Upper case letter to your password . <br>";
                }
            }
            else
            {   
                
                echo "Pasword Length is too short. <br>";
            }
        }
    ?>
</body>
</html>