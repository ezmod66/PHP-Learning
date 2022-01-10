
<?php

    $name = validateInput($_GET["name"], "name");
    $surname = validateInput($_GET["surname"], "surname");
    $msg =  validateInput($_GET["msg"], "msg");


         if($errorCount > 0)
        {
            echo "Please re-enter the information below.<br /> \n";
            redisplayForm($name,$surname, $msg);
        }


    function validateInput($data, $fieldName)
    {
        global $errorCount;
        if(empty($data))
        {
            printVal($fieldName);
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

    function printVal($fieldName)
    {
        echo "This field \"$fieldName\" is required <br>\n";
    }

    function redisplayForm($name,$surname, $msg)
    {
        ?>

        <h2 style="text-align: center;"> Random Form </h2>
        <form action="justPrint.php" method="get">
            <p><input type="text" name="name" placeholder="Enter Name" value="<?php echo $name ?>"></p>
            <p><input type="text" name="surname" placeholder="Enter Surname" value="<?php echo $surname ?>"></p>
            <p><input type="text" name="msg" placeholder="Enter Your Message" value="<?php echo $msg ?>"></p>
            <p><input type="submit" value="Submit Form">&nbsp;&nbsp; <input type="reset" value="Reset Form"></p>
        </form>

        <?php
    }

    if(!empty($name))
    {
        if(!empty($surname))
        {
            if(!empty($msg))
            {
                ?>

                <h2 style="text-align: center;">Random Form </h2>
                <p style="line-height: 200%;">Thank you for filling out the form :D<br><?php
                echo "Hello there ". ucwords($name)." ".ucwords($surname)."<br>\n Your message reads: \"$msg\"";
            }
        }
    }


?>

