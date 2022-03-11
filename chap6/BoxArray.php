<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Box Array</title>
</head>
<body>
	<?php
	
	$smallBox = array("Array1"=> "Small Box","Length"=> 12, "Width"=> 10, "Depth"=> 2.5);
	$mediumBox = array("Array2"=> "Medium Box","Length"=> 30, "Width"=> 20, "Depth"=> 4);
	$largeBox = array("Array3"=> "Large Box","Length"=> 60, "Width"=> 40, "Depth"=> 11.5);

	$multiArr = array($smallBox, $mediumBox, $largeBox);

	// echo "<pre>";
	// var_dump($multiArr);
	// echo "</pre>";
	?>
	<table border="1px">
		<th></th>
		<th>Length</th>
		<th>Width</th>
		<th>Depth</th>

		<?php
		$volume = 0;
			foreach($multiArr as $arr)
			{
				echo "<tr>";
				foreach($arr as $a)
				{
					echo "<td> $a</td>";
				}
				$volume = $arr['Length'] * $arr['Width'] * $arr['Depth'];
				echo "</tr>";
				echo "<tr>";
				echo "<td>Volume:</td>";
				echo "<td>$volume</td>";
				echo "</tr>";
			}
			
		?>
		
	</table>
</body>
</html>