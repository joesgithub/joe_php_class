<?php
//create some vars
$status = 'success';

//Logic to control the message
if( $status == 'success'){
	$message = 'Your information is submitted successfully! Yay!';
} else {
	$message = 'Sorry. Something went wrong. Try Again.';
}

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.error {
			background-color:#F00;
		}
		.success {
			background-color: #0F0;
		}
	</style>
</head>
<body>
	<div class="<?php echo $status; ?>">
		<?php 
		//this is a secret comment
		echo $message; ?>
	</div>

</body>
</html>