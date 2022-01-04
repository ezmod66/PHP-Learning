<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Price</title>
</head>
<body>
    <?php

    $gasPrice = 44;

    if($gasPrice >= 2 && $gasPrice <= 3)
    {
        echo "<p>Gas prices are between $2.00 and $3.00.</p>";
    }
    else
    {
        echo "<p>Gas prices are not between $2.00 and $3.00</p>";
    }

    ?>
</body>
</html>