<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Family Home</title>
</head>
<body>
    <?php

    $singleFamilyHome = 399500;
    $singleHome_Display = number_format($singleFamilyHome,2);

    echo "<p>The current Median price of a single family home in pleasanton,CA is $$singleHome_Display.</p>";
    ?>
</body>
</html>