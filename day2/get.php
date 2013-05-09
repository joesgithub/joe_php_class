<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Get Practice</title>

</head>
<body>
	<form method="get" action="get.php">
		<label for="name">What's your name bro?</label>
		<input type="text" name="name" id="name" />
		<label for="bfast">What'd you have for breakfast bro?</label>
		<input type="text" name="bfast" id="bfast" />

		<input type="hidden" name="did_submit" value="1" />
		<input type="submit" value="Go!" />
		
	</form>

		<?php
		// only show the message if the form was submitted
		if( $_GET['did_submit'] == 1 ){
			echo 'Good Morning, ' . $_GET['name'] . '. It is weird that you had ' . $_GET['bfast'] . ' for breakfast';
		}
		?>

</body>
</html>