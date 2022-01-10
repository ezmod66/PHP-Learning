<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumble maker</title>
</head>
<body>
    <?php

    function displayError($fieldName, $errorMsg)
    {
        global $errorCount;
        echo "Error for \"$fieldName\": $errorMsg<br />\n";
        ++$errorCount;
    }

    function validateWord($data, $fieldName)
    {
        global $errorCount;
        if(empty($data))
        {
            displayError($fieldName, "This field is required");
            $retval = "";
        }
        else
        {
            $retval = trim($data);
            $retval = stripslashes($data);

            if((strlen($retval)<4)||(strlen($retval)>7))
            {
                displayError($fieldName, "Words must be 4-7");
            }

            if(preg_match("/^[a-z]+$/i", $retval) == 0)
            {
                displayError($fieldName, "Words must be only letters");
            }
        }
        $retval = strtoupper($retval);
        $retval = str_shuffle($retval);
        return ($retval);
    }

    $errorCount = 0;
    $words = array();

    $words[] = validateWord($_POST['Word1'], "World 1");
    $words[] = validateWord($_POST['Word2'], "World 2");
    $words[] = validateWord($_POST['Word3'], "World 3");
    $words[] = validateWord($_POST['Word4'], "World 4");

    if($errorCount>0)
    {
        echo "Please use the \"Back\" button to re-enter the data. <br />\n";
    }
    else
    {
        $wordnum = 0;
        foreach($words as $word)
        {
            echo "Word ".++$wordnum.": $word<br />\n";
        }
    }
    ?>
</body>
</html>