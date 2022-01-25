<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfect Palindrome</title>
</head>
<body>
    <h1>Perfect Palindrome</h1><hr />
    <?php
        $words = array(" Stanley Yelnats ", "Ma dam, I'm Adam", "raceCar", "Dogma I am God", "this is not a palindrome", "Ho-Oh");


        foreach($words as $word)
        {
            $lowerCaseWord = strtolower($word);
            $tempWord = str_replace(" ", "", $lowerCaseWord);
            $noPunct = str_replace("'", "", $tempWord);
            $nopunct2 = str_replace(",", "", $noPunct);
            echo $nopunct2. "<br>";

            if($nopunct2 == strrev($nopunct2))
            {
                echo "<p>Match</p>";
            }
            else
            {
                echo "<p>no match</p>";
            }
        }
    ?>
</body>
</html>