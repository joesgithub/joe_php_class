<aside class="cf">
	<?php
	//set up query to get the titles and post_id of the latest 10 posts
	$query_latest = "SELECT title, post_id
					FROM posts
					WHERE is_public = 1
					ORDER BY date DESC
					LIMIT 10";
	//run query and check for results
	if( $result_latest = $db->query($query_latest) ):
	?>
	<h2>Lastest Posts</h2>
	<ul>
		<?php while( $row_latest = $result_latest->fetch_assoc() ): ?>
		<li><a href="index.php?page=single&amp;post_id=<?php echo $row_latest['post_id']; ?>"><?php echo $row_latest['title']; ?></a></li>
		<?php endwhile; ?>
	</ul>
	<?php endif; ?>


	<?php
	//set up query to get the name and category_id of the top
	$query_cats = "SELECT name, category_id
					FROM categories
					ORDER BY name ASC
					LIMIT 10";
	//run query and check for results
	if( $result_cats = $db->query($query_cats) ):
	?>
	<h2>Categories</h2>
	<ul>
		<?php while( $row_cats = $result_cats->fetch_assoc() ): ?>
		<li><a href="#"><?php echo $row_cats['name']; ?></a></li>
		<?php endwhile; ?>
	</ul>
	<?php endif; ?>


	<?php
	//set up query to get the name and category_id of the top
	$query_links = "SELECT title, links_id, url
					FROM links
					ORDER BY title ASC
					LIMIT 10";
	//run query and check for results
	if( $result_links = $db->query($query_links) ):
	?>
	<h2>Links I Like</h2>
	<ul>
		<?php while( $row_links = $result_links->fetch_assoc() ): ?>
		<li><a href="<?php echo $row_links['url']; ?>"><?php echo $row_links['title']; ?></a></li>
		<?php endwhile; ?>
	</ul>
	<?php endif; ?>
</aside>