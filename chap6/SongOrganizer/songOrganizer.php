<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Song Organizer</title>
</head>
<body>
	<h1>Song Organizer</h1>
	<!-- handle any params from url -->
	<?php
	if(isset($_GET['action']))
	{
		if(file_exists("songs.txt") && filesize("songs.txt") != 0)
		{
			$songArray = file("songs.txt");

			switch ($_GET['action'])
			{
				case 'Remove Duplicates':
					$songArray = array_unique($songArray);
					$songArray = array_values($songArray);
					break;
				case 'Sort Ascending':
					sort($songArray);
					break;
				case 'Shuffle':
					shuffle($songArray);
					break;
			}

			//save song list after modification
			if(count($songArray) > 0)
			{
				$newSongs = implode($songArray);
				$songStore = fopen("songs.txt","wb");

				if($songStore === false)
				{
					echo "There was an error updating the song file\n";
				}
				else
				{
					fwrite($songStore, $newSongs);
					fclose($songStore);
				}
			}
			else
			{
				unlink("songs.txt");
			}

		}
	}

	
	if(isset($_POST['submit']))
	{
		$songToAdd = stripslashes($_POST['songName']) . "\n";
		$existingSongs = array();

		if(file_exists("songs.txt") && filesize("songs.txt") > 0)
		{
			$existingSongs = file("songs.txt");
		}
		//check if song name already entered into list
		if(in_array($songToAdd, $existingSongs))
		{
			echo "<p>The song you entered already exists! <br> \n";
			echo "Your song was added to the list </p>";
		}
		else
		{
			$songFile = fopen("songs.txt","ab");

			if($songFile === false)
			{
				echo "There was an error saving your message!\n";
			}
			else
			{
				fwrite($songFile, $songToAdd);
				fclose($songFile);
				echo "Your song has been added to the list.";
			}
		}
	}

	if((!file_exists("songs.txt")) || (filesize("songs.txt") == 0))
	{
		echo "<p>There are no songs in the list.</p>\n";
	}
	else
	{
		$songArray = file("songs.txt");
		?>
		<table border="1px" width="100%" style="background-color:lightgray">\n
		<?php
		foreach($songArray as $song)
		{
			echo "<tr>\n";
			echo "<td>" . htmlentities($song) . "</td>";
			echo "</tr>\n";
		}
		?>
		</table>
	<?php	
	}
	?>

	<p>
		<a href="SongOrganizer.php?action=Sort%20Ascending">Sort Song List</a><br/>
		<a href="SongOrganizer.php?action=Remove%20Deuplicates">Remove Duplicate Songs</a><br>
		<a href="SongOrganizer.php?action=Shuffle">Randomize Song List</a><br>
	</p>

	<form action="songOrganizer.php" method="post">
		<p>Add a New Song</p>
		<p>Song Name: <input type="text" name="songName"/></p>
		<p><input type = "submit" name="submit" value="Add Song to List"/></p>
		<p><input type ="reset" name="reset" value="Reset Song Name"/></p>
	</form>
</body>
</html>