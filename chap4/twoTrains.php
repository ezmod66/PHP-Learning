<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Trains</title>
</head>

<body>
    <?php
    //Rules
    // - 3 inputs required
    // - all inputs must be > 0
    // - 
    function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data))
        {
        echo "\"$fieldName\" is a required field.<br />\n";
                ++$errorCount;
                $retval = "";
        }
        else
        {
                $retval = trim($data);
                $retval = stripslashes($retval);
        }
                return($retval);
}

    function displayForm($speedA,$speedB,$distance)
    {
    ?>
        <h2>Two Train Problem</h2>
        <form action="#" method="post">
            <p><input type="number" name="speedA" placeholder="Speed A" value="<?php echo $speedA; ?>"></p>
            <p><input type="number" name="speedB" placeholder="Speed B" value="<?php echo $speedB;?>"></p>
            <p><input type="number" name="distance" placeholder="Distance Between A-B" value="<?php echo $distance; ?>"></p>
            <p><input type="reset" name="reset" value="Reset Form">&nbsp;&nbsp;<input type="submit" name="submit" value="Calculate"></p>
        </form>

    <?php
    }

    // function printTime($timeA, $timeB, $distance, $distanceA, $distanceB, $speedA, $speedB)
    // {
    //     echo "<p>Train A is currently moving at a speed of $speedA.<br></p>";
    //     echo "<p>Train B is currently moving at a speed of $speedB<br></p>";
    //     echo "<p> Distance between Train A and Train B is $distance\km.";
    //     echo
    // }

        $showForm = TRUE;
        $errorCount = 0;
        $speedA = "";
        $speedB = "";
        $distance = "";

    if (isset($_POST['submit'])) {
        $speedA = validateInput($_POST['speedA'], "Speed A");
        $speedB = validateInput($_POST['speedB'], "Speed B");
        $distance = validateInput($_POST['distance'], "Distance Between A-B");

        if($errorCount == 0)
        {
            $showForm = false;
        }
        else
        {
            $showForm = true;

        }
    } 

    if($showForm == true)
    {
        if($errorCount > 0)
        {
            echo "<p>You can Re enter the details below.</p>";
            displayForm($speedA,$speedB,$distance);
        }
        else
        {
            $distanceA = (($speedA / $speedB) * $distance) / (1 + ($speedA / $speedB));

			if ($distanceA)
            {
                echo "Train A has Traveled = ".round($distanceA,2)."<br/>";
                $distanceB = $distance - $distanceA;
                echo "Distance Traveled By Train B = ", round($distanceB,2),"<br />";
                $timeA = $distanceA / $speedA;
                echo "Time Traveled By Train A = ",round($timeA,2),"<br />";
                $timeB = $distanceB / $speedB;
                echo "Time Traveled By Train B = ",round($timeB,2),"<br />";
            }
        }
    }
    ?>





</body>

</html>