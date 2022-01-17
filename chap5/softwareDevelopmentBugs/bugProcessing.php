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

    function saveToFile($submit)
    {
        if (isset($submit)) 
    {
        $reportName = ValidateInput($_POST['bugReportName'], "Bug Report Name");
        $prodName = validateInput($_POST['productName'], "Product Name");
        $prodVer = validateInput($_POST['productVersion'], "Production Version");
        $hardwareType = validateInput($_POST['typeOfHardware'], "Type of hardware");
        $os = validateInput($_POST['OS'], "Operating System");
        $freq = validateInput($_POST['frequency'], "Frequency of occurrence");
        $proposedSolution = validateInput($_POST['proposedSolution'], "Proposed Solution");

        $fp = "bugs.txt";
        $bugs = fopen($fp, "ab");

        if ($errorCount == 0) {
            if (is_writable("bugs.txt")) {
                if (fwrite($bugs, $reportName . "," . $prodName . "," . $prodVer . "," . $hardwareType . "," . $os . "," . $freq . "," . $proposedSolution . "\n")) {
                    echo "Bug report Successfully created";
                    //clear
                    $_POST = array();
                    //refresh
                } else {
                    echo "cannot save this bug report";
                }
            } else {
                echo "<p>Cannot Save to file.</p>";
            }
        }
    }  
    }


?>