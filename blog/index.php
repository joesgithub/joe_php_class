<?php require('db_connect.php');
include_once( 'functions.php' ); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
<title>Joe's Easy Blog</title>
</head>
<body>
<div class="container">
<header>
	<h1>Joe's Blog</h1>
	<nav>
		<ul>
			<a href="index.php"><li>Home</li></a>
			<a href="index.php?page=blog"><li>Blog</li></a>
			<a href="index.php?page=links"><li>Links</li></a>
		</ul>
	</nav>
</header>

<main>
<?php
	//logic to lad the correct page contents
	//URI will look like domain/index.php?page=something
	switch( $_GET['page'] ){
		case 'blog':
			include( 'content_blog.php' );
		break;
		case 'links':
			include( 'content_links.php' );
		break;
		case 'single':
			include( 'content_single.php' );
		break;
		default:
			include('content_home.php');
	}
?>
</main>

<?php include('aside.php'); ?>

<footer>
	<p>Something Placeholdery for Footer</p>
</footer>
</div>
</body>
</html>