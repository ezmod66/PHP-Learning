<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional Script</title>
</head>
<body>
    <?php

    $intVal = 75;

    if($intVal > 100)
    {
        $result = "$intVal is greater than 100";
    }
    else
    {
        $result = "$intVal is less than or = 100";
    }

    echo $result;
    ?>
    

</body>
</html>