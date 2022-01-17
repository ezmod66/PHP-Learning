<?php

$fp = "bugs.txt";
$bugs = fopen($fp, "ab");
$eachLine = file($fp, FILE_IGNORE_NEW_LINES);
$bugReports = [];

    foreach($eachLine as $lines)
    {
       $array = explode(',',$lines);

       $bugReports[] = $array;
    }
    // echo "<pre>";
    // var_dump($bugReports);
    // echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug submission reports</title>
</head>

<body>
    <!-- create form to accept following -->
    <!-- fields = product name, version, type of hardware, OS, frequency of occurrence, proposed solutions -->
    <!-- add links for creation and viewing a report -->
    <!-- allow to update the report -->
    <p>Select to modify Report <br>
    </p><select name="bugReports" id="">
        <?php
            $count = 0;
            foreach($bugReports as $report)
            {   
                echo "<option value='$count'>$report[0]</option>";
                ++$count;
            }
        ?>
    </select>
    <button>Modify Bug report</button>

    <form action="bugs.php" method="post">
        <p>Bug Report Name:<br><input type="text" name="bugReportName" value="<?php echo (isset($_Post['bugReportName']) ? $_POST['bugReportName'] : "")  ?>"required></p>
        <p>Product Name: <br><input type="text" name="productName" required></p>
        <p>Version: <br><input type="text" name="productVersion" required ></p>
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
    if(isset($_POST['submit']))
    {
        $reportName = ValidateInput($_POST['bugReportName'], "Bug Report Name");
        $prodName = validateInput($_POST['productName'], "Product Name");
        $prodVer = validateInput($_POST['productVersion'], "Production Version");
        $hardwareType = validateInput($_POST['typeOfHardware'], "Type of hardware");
        $os = validateInput($_POST['OS'], "Operating System");
        $freq = validateInput($_POST['frequency'], "Frequency of occurrence");
        $proposedSolution = validateInput($_POST['proposedSolution'], "Proposed Solution");

        if ($errorCount == 0) {
            if (is_writable("bugs.txt")) {
                if (fwrite($bugs,$reportName.",". $prodName . "," . $prodVer . "," . $hardwareType . "," . $os . "," . $freq . "," . $proposedSolution . "\n")) {
                    echo "Successfully saved to file";
                    $_POST = array();
                    header("Refresh:0");
                } else {
                    echo "cannot save this bug report";
                }
            } else {
                echo "<p>Cannot Save to file.</p>";
            }
        }
    }
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
    

    ?>
</body>

</html>