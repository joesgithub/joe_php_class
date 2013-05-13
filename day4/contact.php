<?php
//parse the form if it was submittted
if($_POST['did_submit'] ):
	//extract user submitted data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$newsletter = $_POST['newsletter'];

	//todo: validate!
	if( 1 == $newsletter ):
		$newsletter = 'YES!';
	else:
		$newsletter = 'no';
	endif;

	//get ready to send mail - set up mail() parameters

	$to = 'iwant2borange2@yahoo.com';
	$subject = 'Contact form from wp310 class demo';

	$body = "Name: $name \n";
	$body .= "Email: $email \n";
	$body .= "Phone: $phone \n";
	$body .= "Add to Newletter List? $newsletter \n\n";
	$body .= "Message: $message \n\n";

	$header = "Reply-to: $email \r\n";
	$header .= "From: $name \r\n";

	//send it! did_send will equal 1 if the mail sends, 0 if it fails to send
	$did_send = mail( $to, $subject, $body, $header );

	//handle success/failure user feedback
	if( $did_send ):
			$display_msg = 'Thank you for your message, ' . $name . 'I will get back to you soon.';
		else:
			$display_msg = 'Sorry, there was a poblem sending yoru message.';

	endif; //did_send

endif; //did_submit

?>

<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<meta charset="utf-8">
<title>Example Contact Form</title>

<style type="text/css">

label, input, textarea {
	display: block;
}

input[type="checkbox"],
#textarea {
	display: inline;
	margin: 20px 0;
}

body {
	background: #ecf0f1;
	color: #fff;
	font-family: 'Open Sans', Arial, Helvetica, Verdana, sans-serif;
}

.container {
	background: #3498db;
	margin: auto;
	width: 320px;
	padding: 20px;
}

h1 {
	font-weight: 100;
	font-size: 36px;
	margin: 0 0 30px 0;
	padding: 0;
}

label {
	margin-top: 20px;
	font-weight: 100;
	font-size: 14px;
}

input {
	background: #ecf0f1;
	border: none;
	height: 25px;
}

textarea {
	background: #ecf0f1;
	border: none;
	height: 60px;

}

input[type="text"] {
	width: 320px;
}

input[type="submit"] {
	background: #ecf0f1;
	border: solid 1px #2980b9;
	color: #2980b9;
	padding: 6px;
	width: 112px;
	height: 30px;
}

input[type="submit"]:hover,
input[type="submit"]:active,
input[type="submit"]:focus {
	background: #2980b9;
	border: solid 1px #ecf0f1;
	color: #ecf0f1;
}


</style>

</head>
<body>
<section class="container">
	<header>
		<h1>Contact Form, Guy</h1>
	</header>
	
	<?php
	if( isset($display_msg) ):
		echo $display_msg;
	endif;
	?>
<?php if( !$did_send ): ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" />

		<label for="email">Email</label>
		<input type="text" name="email" id="email" />

		<label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" />

		<label for="message">Message</label>
		<textarea name="message" id="message"></textarea>

		<input type="checkbox" name="newsletter" value="1" />
		<label id="textarea">I would like to receive the newsletter!</label>

		<input type="hidden" name="did_submit" value="1" />
		<input type="submit" value="Send Message">
	</form>
<?php endif; //hide form if did_send ?>
</section>

</body>
</html>