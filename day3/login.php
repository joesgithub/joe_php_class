<?php
//thecorrecd tusername and password
$correct_user = 'joepena';
$correct_pass = 'joepena';

//if the form was submitted, try to log them in
if( $_POST['did_login'] ){
	//extract the values the user typed in
	$username = $_POST['username'];
	$password = $_POST['password'];

	//compare user values with correct values. if they match log them in
	if( $username == $correct_user AND $password == $correct_pass){
		$logged_in = 1;
	} else {
		$error = 1;
	}

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Log into your account</title>

</head>
<body>

<?php
//if not logged in, show the form
if( !$logged_in ){
?>

	<h1>Log In!</h1>

	<?php
	//if an error was triggerd, show a message
	if( $error ){
		echo 'Username and password do not match. Try Again.';
	}
	?>
	<form method="post" action="login.php">
		<label for="username">Username: </label>
		<input type="text" name="username" id="username" />
		<br />

		<label for="password">Password: </label>
		<input type="text" name="password" id="password" />

		<input type="hidden" name="did_login" value="1" />
		<input type="submit" value="Log In" />

	</form>
<?php
}//end if not logged in
else{
	echo 'You are logged in';
}
?>

</body>
</html>
