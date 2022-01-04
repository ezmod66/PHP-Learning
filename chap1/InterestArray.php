<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest Array</title>
</head>
<body>
    <?php 

        $ratesArray = [$interestRate1 = .0725, $interestRate2 = .0750,
                       $interestRate3 = .0775, $interestRate4 = .0800,
                       $interestRate5 = .0825, $interestRate6 = .0850,
                       $interestRate7 = .0875];

        echo "<pre>";
        var_dump($ratesArray);
        echo "</pre>";

    ?>
</body>
</html>