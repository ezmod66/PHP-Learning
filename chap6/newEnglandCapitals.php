<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New England State Capitals</title>
</head>
<body>
	<?php
		$stateCapitals = array("Connecticut" => "Hartford",
								"Maine" => "Augusta", 
								"Massachusetts" => "Boston",
								"New Hampshire" => "Concord",
								"Rhode Island" => "Providence",
								"Vermont" => "Montpelier");

		if(isset($_POST['submit']))
		{
			$answers = $_POST['answers'];
			if(is_array($answers))
			{
				foreach($answers as $state => $response)
				{
					$response = stripslashes($response);
					if(strlen($response) > 0)
					{
						if(strcasecmp($stateCapitals[$state], $response) == 0)
						{
							echo "<p>Correct! The capital of $state is " . $stateCapitals[$state] ."</p>\n";
						}
						else
						{
							echo "<p>Sorry, the capital of $state is not '" . $response . "'.</p>\n";
						}
					}
					else
					{
						echo "<p>You did not enter a value for the capital of $state</p>";
					}
				}
			}
			echo "<p><a href='newEnglandCapilats.php'>Try again?</a></p>\n";
		}
		else 
		{
			echo "<form action='newEnglandCapitals.php' method='POST'>\n";
			foreach($stateCapitals as $state => $response)
			{
				echo "The capital of $state is: 
					  <input type= 'text' name='answers[" . $state ."]' /><br />\n";
			}

			echo "<input type= 'submit' name= 'submit' value= 'Check Answers' />";
				echo "<input type= 'reset' name= 'reset' value= 'Reset Form' />\n";
				echo "</form>\n";
		}
	?>
</body>
</html>