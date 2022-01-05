<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate Credit Card</title>
</head>

<body>

    <h1>Validate Credit Card</h1>
    <?php
    $creditCard = array("", "8910-1234-5678-6543", "OOOO-9123-4567-0123");

    foreach($creditCard as $cardNumber)
    {
        if(empty($cardNumber))
        {
            echo "<p>This Credit Card Number is invalid because it contains an empty string</p>";
        }
        else
        {
            $creditCardNumber = $cardNumber;
            $creditCardNumber = str_replace("-", "",$creditCardNumber);
            $creditCardNumber = str_replace(" ", "", $creditCardNumber);

            if(!is_numeric($creditCardNumber))
            {
                echo "<p>Credit Card Number " . $creditCardNumber ." is not a valid Credit Card Number Because it contains a non-numeric character.</p>";
            }
            else
            {
                echo "<p>Credit Card Number " . $creditCardNumber . " is a valid Credit Card number.</p>";
            }
        }
    }

    ?>
</body>

</html>