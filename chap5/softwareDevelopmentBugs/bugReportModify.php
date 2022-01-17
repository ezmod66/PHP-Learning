<?php
include "bugProcessing.php";
$fp = "bugs.txt";
$bugs = fopen($fp, "ab");
$eachLine = file($fp, FILE_IGNORE_NEW_LINES);
$bugReports = [];

foreach ($eachLine as $lines) {
    $array = explode(',', $lines);

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
    <title>Update your Bug Report</title>
</head>

<body>

    <form action="bugReportModify.php" method="get">
        <p>Select to modify Report <br>
        </p><select name="bugReportSelection" id="bugReportSelection">
            <?php
            $count = 0;
            foreach ($bugReports as $report) {
                echo "<option value='$count'>$report[0]</option>";
                ++$count;     
            }
            ?>
        </select>

        <input type="submit" value="Show Details" name="show">
    </form>

    <?php 
    if(isset($_GET['show']))
    {
        $reportName = $bugReports[$_GET['bugReportSelection']][0];
        $prodName = $bugReports[$_GET['bugReportSelection']][1];
        $prodVer = $bugReports[$_GET['bugReportSelection']][2];
        $hardwareType = $bugReports[$_GET['bugReportSelection']][3];
        $os = $bugReports[$_GET['bugReportSelection']][4];
        $freq = $bugReports[$_GET['bugReportSelection']][5];
        $proposedSolution = $bugReports[$_GET['bugReportSelection']][6];
    }
    else
    {
        $reportName = "";
        $prodName = "";
        $prodVer = "";
        $hardwareType = "";
        $os = "";
        $freq = "";
        $proposedSolution = "";
    }
    

    ?>
    <form action="bugs.php" method="post">
        <p>Bug Report Name:<br><input type="text" name="bugReportName" value='<?php echo $reportName; ?>' required></p>
        <p>Product Name: <br><input type="text" name="productName" value="<?php echo $prodName;?>" required></p>
        <p>Version: <br><input type="text" name="productVersion" value="<?php echo $prodVer; ?>" required></p>
        <p>Type of Hardware: <br> <input type="text" name="typeOfHardware" value="<?php echo $hardwareType; ?>" required></p>
        <p>Operating System: <br><select name="OS" required>
                <option value="Mac"<?php if($os === "Mac"){ echo "Selected";}?>>Mac</option>
                <option value="Windows"<?php if($os === "Windows"){ echo "Selected";}?>> Windows</option>
                <option value="Linux"<?php if($os === "Linux"){ echo "Selected";}?> >Linux</option>
                <option value="Other"<?php if($os === "Other"){ echo "Selected";}?>>Other</option>
            </select></p>
        <p>Frequency of occurrence: <br><input type="text" name="<?php echo $freq; ?>" value="<?php echo $freq ?>" required></p>
        <p>Proposed Solutions: <br><textarea name="proposedSolution" value="<?php echo $proposedSolution?>" cols="30" rows="10" required></textarea></p>

        <p><input type="reset" value="Reset Form">&nbsp;&nbsp;<input type="submit" value="Modify Report" name="submit"></p>
    </form>

</body>

</html>