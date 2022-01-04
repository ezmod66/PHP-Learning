<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odd Numbers</title>
</head>
<body>
    <?php
        $count = 0;
        while($count < 100)
        {
            if($count % 2 == 0)
            {
                $count++;
            }
            else
            {
                echo $count."<br>";

                $count++;
            }
        }
    ?>
</body>
</html>