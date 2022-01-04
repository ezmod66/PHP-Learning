<?php

$variable = "A";

if(is_numeric($variable))
{
    echo $variable. " is a numeric";

    if($variable % 2 == 0)
    {
        echo "and ".$variable." is even <br>";
    }
    else
    {
        echo " and ".$variable." is odd";
    }
}
else
{
    echo $variable. " is not a numeric";
}


?>