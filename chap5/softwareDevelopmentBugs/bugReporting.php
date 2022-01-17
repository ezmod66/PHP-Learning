<?php include "bugProcessing.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit A Bug</title>
</head>
<body>
<form action="bugReporting.php" method="post">
        <p>Bug Report Name:<br><input type="text" name="bugReportName" required></p>
        <p>Product Name: <br><input type="text" name="productName" required></p>
        <p>Version: <br><input type="text" name="productVersion" required></p>
        <p>Type of Hardware: <br> <input type="text" name="typeOfHardware" required></p>
        <p>Operating System: <br><select name="OS" required>
                <option value="Mac">Mac</option>
                <option value="Windows"> Windows</option>
                <option value="Linux">Linux</option>
                <option value="Other">Other</option>
            </select></p>
        <p>Frequency of occurrence: <br><input type="text" name="frequency" required></p>
        <p>Proposed Solutions: <br><textarea name="proposedSolution" id="" cols="30" rows="10" required></textarea></p>
        <p><input type="reset" value="Reset Form">&nbsp;&nbsp;<input type="submit" value="Create Ticket" name="submit"></p>
    </form>

    <?php
    //check if input is set
    if (isset($_POST['submit'])) 
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
    ?>
</body>
</html>