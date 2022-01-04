<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Roll</title>
</head>
<body>
    <?php

    $faceNamesSingular = array("one", "two", "three", "four", "five", "six");
    $faceNamesPlural = array("ones", "twos", "threes", "fours", "fives", "sixes");
    $faceValues = array(1,2,3,4,5,6);
    function checkForDoubles($die1, $die2)
    {
        global $faceNamesSingular;
        global $faceNamesPlural;
        if($die1 == $die2)
            echo "The roll was double ",$faceNamesPlural[$die1-1], ".<br />";
        if($die1 != $die2)        
            echo "The roll was a ", $faceNamesSingular[$die1-1],
            " and a ", $faceNamesSingular[$die2-1], ".<br />";
        
    }

    function DisplayScoreText($score, $doubles)
    {
        switch ($score) {
            case 2:
                echo "You rolled snake eyes!<br />";
                break;
            case 3:
                echo "You rolled a loose deuce!<br />";
                break;
            case 5:
                echo "You rolled a fever five!<br />";
                break;
            case 7:
                echo "You rolled a natural!<br />";
                break;
            case 9:
                echo "You rolled a nina!<br />";
                break;
            case 11:
                echo "You rolled a yo!<br />";
                break;
            case 12:
                echo "You rolled boxcars!<br />";
                break;
            default:
                if($score % 2 == 0) {
                    if($doubles) {
                        echo  "You rolled a hard $score! <br />";
                    }
                    else {
                        echo "You rolled an easy $score! <br />";
                    }
                }
                break;
        }
              
    }

    $rollCount = 0;
    $rollNumber = 1;
    $doubleCount = 0;
    $scoreCount = array();


    for($possibleRolls = 2; $possibleRolls <= 12; ++$possibleRolls)
    {
        $scoreCount[$possibleRolls] = 0;
    }

    foreach($faceValues as $die1)
    {   
        foreach($faceValues as $die2)
        {
            ++$rollCount;
            $score = $die1 + $die2;
            ++$scoreCount[$score];

            echo "The total score for roll $rollCount was $score.<br />";
            $doubles = checkForDoubles($die2,$die2);
            DisplayScoreText($score, $doubles);
            echo "<br>";
        }
    }

    echo "<p> Doubles occurred on $doubleCount of the $rollCount rolls.</p>";

    foreach($scoreCount as $scoreValue => $scoreCount)
    {
        echo "<p> A combined value of $scoreValue occured $scoreCount of $rollCount times.</p>";
    }

    ?>
</body>
</html>