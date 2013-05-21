<?php
					// db host, username, password, database name
$db = new mysqli( 'localhost', 'joepena', 'Sn0wf0xes!', 'blog_jp' );
//if there is an error connecting, kill the page
if( $db->connect_errno  > 0 ){
	die('Unable to Connect to the Database');
}