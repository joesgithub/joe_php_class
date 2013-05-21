<?php
//open a new session or resume the existing session
session_start();
//thecorrect tusername and password
$correct_user = 'joepena';
$correct_pass = 'joepena';

//if the form was submitted, try to log them in and sanitize
if( $_POST['did_login'] ){
	//extract the values the user typed in
	$username = strip_tags(trim($_POST['username']));
	$password = strip_tags(trim($_POST['password']));

	//check to see if minimum lengths are met(validate)
	if(strlen( $username ) >= 5 AND strlen( $password ) >= 5 ){

		//compare user values with correct values. if they match log them in
		if( $username == $correct_user AND $password == $correct_pass){
			//use cookie sessions to remember the user
			$_SESSION['logged_in'] = 1;
			setcookie( 'logged_in_cookie', 1, time() + 60 * 10 );
		} else {
			$error = 1;
		}
	}else{
		//username or pass too short
		$error = 1;
	}
}

//if the user is trying to log out, unset and destroy the session and cookies
if( $_GET['action'] == 'logout' ){
	unset( $_SESSION['logged_in'] );
	session_destroy();
	setcookie('logged_in_cookie', '', time() - 60 * 60 * 42 * 365);
}

//if the user visits the page, and the cookie is still valid, re-create the session variable
elseif( $_COOKIE['logged_in_cookie'] == 1 ){
	$_SESSION['logged_in'] = 1;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Log into your account</title>
<link rel="stylesheet" type="text/css" href="login_css.css" media="screen">
</head>
<body>

<section class="container">

<?php
//if not logged in, show the form
if( !$_SESSION['logged_in'] ){
?>

	<h1>Log In!</h1>

	<?php
	//if an error was triggerd, show a message
	if( $error ){
		echo 'Username or password is incorrect. Try Again.';
	}
	?>
	<form method="post" action="login_cookie_session.php">
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
?>
	<p>You are logged in!</p>
	<p><a href="login_cookie_session.php?action=logout">Log Out</a></p>
<?php
}//end else
?>

</section>

</body>
</html>
