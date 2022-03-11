<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Guest Book</title>
</head>

<body>
	<h1>GuestBook</h1>

	<?php
	if (isset($_POST['action'])) {
		if (file_exists("guestBook.txt") && filesize("guestBook.txt") > 0) {
			$guestArray = file("guestBook.txt");

			switch ($_POST['action']) {
				case 'RemoveDuplicates':
					$guestArray = array_unique($guestArray);
					$guestArray = array_values($guestArray);
					break;
				case 'Sort By Name':
					sort($guestArray);
					break;
			}

			//save song list after modification
			if (count($guestArray) > 0) {
				$newGuests = implode($guestArray);
				$guestStore = fopen("guestBook.txt", "wb");

				if ($guestStore === false) {
					echo "There was an error updating the song file\n";
				} else {
					fwrite($guestStore, $newGuest);
					fclose($guestStore);
				}
			} else {
				unlink("guestBook.txt");
			}
		} 
	}
	?>
	<p>
		<a href="guestbook.php?action=Sort%20By%20Name">Sort Guest Book</a><br />
		<a href="guestbook.php?action=Remove%20Deuplicates">Remove Duplicates</a><br>
	</p>

	<form action="guestbook.php" method="post">
		<p>Full Name</p>
		<p><input type="text" name="name"></p>
		<p>Email: </p>
		<p><input type="email" name="email"></p>
		<input type="submit" value="Save Guest">
	</form>
</body>

</html>