<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Post Practice</title>

</head>
<body>
	<form method="post" action="post.php">
		<label for="name">What's your name bro?</label>
		<input type="text" name="name" id="name" />
		<label for="bfast">What'd you have for breakfast bro?</label>
		<input type="text" name="bfast" id="bfast" />

		<input type="hidden" name="did_submit" value="1" />
		<input type="submit" value="Go!" />
		
	</form>

		<?php
		// only show the message if the form was submitted
		if( $_POST['did_submit'] == 1 ){
			echo 'Good Morning, ' . $_POST['name'] . '. It is weird that you had ' . $_POST['bfast'] . ' for breakfast';
		}
		?>

</body>
</html>