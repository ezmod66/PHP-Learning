<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while Logic</title>
</head>
<body>
    <?php
        $count = 0;
        $numbers = array();

        while($count <= 100)
        {
            $numbers[] = $count;
            $count++;
        }

        foreach($numbers as $curNum)
        {
            echo "<p> $curNum</p>";
        }

    ?>
</body>
</html>