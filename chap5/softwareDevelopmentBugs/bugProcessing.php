<!-- sss -->

<?php

function displayRequired($fieldName)
{
    echo    "The field\"$fieldName\" is required.<br />\n";
}

function validateInput($data, $fieldName)
{
    global $errorCount;
    if (empty($data)) {
        displayRequired($fieldName);
        ++$errorCount;
        $retval = "";
    } else {
        $retval = trim($data);
        $retval = stripslashes($retval);
    }
    return $retval;
}

// function displayDetails($bugReportSelection, $bugReports)
// {
//     echo $bugReports[$bugReportSelection][0];
// }


?>