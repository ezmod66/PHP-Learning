<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>European Travel</title>
</head>
<body>
	<?php
		$distances = array(
			"Berlin" => array(
				"Berlin" => 0,
				"Moscow" => 1607.99,
				"Paris" => 876.96,
				"Prague" => 280.34,
				"Rome" => 2374.26,
			),
			"Moscow" => array(
				"Berlin" => 167.99,
				"Moscow" => 0,
				"Paris" => 2484.92,
				"Prague" => 1664.04,
				"Rome" => 2374.26,
			),
			"Paris" => array(
				"Berlin" => 879.96,
				"Moscow" => 641.31,
				"Paris" => 0,
				"Prague" => 885.38,
				"Rome" => 1105.76,
			),
			"Prague" => array(
				"Berlin" => 280.34,
				"Moscow" => 1664.04,
				"Paris" => 885.38,
				"Prague" => 0,
				"Rome" => 922,
			),
			"Rome" => array(
				"Berlin" => 1181.67,
				"Moscow" => 2374.26,
				"Paris" => 1105.76,
				"Prague" => 922,
				"Rome" => 0,
			)
		);

		$startIndex = "";
		$endIndex = "";
		$kmToMiles = 0.62;

		//process entered city
		if(isset($_POST['submit']))
		{
			$startIndex = stripslashes($_POST['start']);
			$endIndex = stripslashes($_POST['end']);

			if(isset($distances[$startIndex][$endIndex]))
			{
				echo "<p>The distance from $startIndex to $endIndex is " . $distances[$startIndex][$endIndex]
					. "Km, or " . round($kmToMiles * $distances[$startIndex][$endIndex], 2)
					. "miles.</p>\n";
			}
			else
			{
				echo "<p>The distance from $startIndex to $endIndex is not in the array.</p>\n";
			}
		}
	?>

	<form action="EuropeanTravel.php" method="post">
		<p>Starting City:
			<select name="start">
			<?php
			foreach($distances as $city => $otherCities)
			{
				echo "<option value='$city'";
				if(strcmp($startIndex,$city) ==0 )
				{
					echo " selected";
				}
				echo ">$city</option>\n";
			}
			?>
			</select>
		</p>

		<p>Ending City:
			<select name="end">
			<?php
			foreach($distances as $city => $otherCities)
			{
				echo "<option value='$city'";
				if(strcmp($endIndex,$city) ==0 )
				{
					echo " selected";
				}
				echo ">$city</option>\n";
			}
			?>
			</select>
		</p>
		<p><input type="submit" name="submit" value="Calculate Distance"></p>
	</form>
</body>
</html>