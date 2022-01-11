<!-- two part form to calculate employee weekly gross salary  -->
<!-- salary = hours worked * hourly wage  -->
<!-- use form with 2 boxes. hours 1 wage. use php form handler. Compute any hours over 40 as time and a half. verify and validate submitted form data + provide approriate -->
<!-- error messages -->

<?php

function validateInput($data, $fieldName)
{
    global $errorCount;

        if (empty($data)) {
            echo "\"$fieldName\" is a required field. <br />\n";
            ++$errorCount;
            $retVal = "";
        } 
        else 
            {
                 $retVal = trim($data);
                $retVal = stripslashes($retVal);
            }   
    return $retVal;
}

    function CalculateWage($numOfHours,$hourlyWage)
    {
       if($numOfHours > 40)
       {    
            $hoursOverForty = $numOfHours - 40;
            $plainWage = 40 * $hourlyWage;
            $newWage =  $hoursOverForty * ($hourlyWage * 1.5);

            $wage = $plainWage + $newWage;
       }
       else
       {
            $wage = $numOfHours * $hourlyWage;

       }

       return $wage;
    }

    function reDisplayForm($hoursWorked, $wageRate)
    {
        ?>
        <form action="payCheck.php" method="post">
        <p><input type="text" name="numOfHours" placeholder="Enter Number of Hours" value="<?php echo $hoursWorked?>"></p>
        <p><input type="text" name="hourlyWage" placeholder="Enter Hourly Wage" value="<?php echo $wageRate?>"></p>
        <p><input type="reset" value="Clear Form">&nbsp;&nbsp;<input type="submit" value="Calculate Wage"></p>
    </form>
        <?php
    }


    //on submission
    if(isset($_POST['submit']))
    {
        $numOfHours = validateInput($_POST['numOfHours'], "Number Of Hours");
        $hourlyWage = validateInput($_POST['hourlyWage'], "Hourly Wage");

        if (is_numeric($numOfHours) && is_numeric($hourlyWage)) {
            $totalWage =  calculateWage($numOfHours, $hourlyWage);
            $monthlyWage = $totalWage * 4;
            $yearlyWage = $monthlyWage * 12;

            echo "<p>Current, while working $numOfHours hours a week.<br> At a rate of R$hourlyWage/h.<br> You will earn: R$totalWage for a week<br></p>\n";
            echo "<p>Per Month you will earn:  R$monthlyWage</p>\n";
            echo "<p>Per Year you will earn: R$yearlyWage</p>";

        }

        
    }

?>