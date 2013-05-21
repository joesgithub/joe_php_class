
<?php
//set up a query to get the latest two posts that are public
$query = 'SELECT links.*, users.*
FROM links, users
WHERE links.user_id = users.user_id
ORDER BY links.links_id ASC
LIMIT 10';
//run it and check to make sure the result contains posts
if( $result = $db->query($query) ):
	?>

<h2>Links, Guy</h2>

<?php
	//loop through the list of results
while( $row = $result->fetch_assoc() ):
	?>

<article class="link">
	<a href="<?php echo $row['url']; ?>"><h3><?php echo $row['title']; ?></h3></a>
	<p><?php echo $row['description']; ?></p>
	<address class="postmeta">By <?php echo $row['username']; ?></address>
</article>
<?php endwhile; ?>

<?php else: ?>

	<h2>No Posts to Show</h2>

<?php endif; ?>
