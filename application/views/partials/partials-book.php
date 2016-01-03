<?php 
	echo "<div id='others'>
	<h2> Other Books with Reviews:</h2>";	

	foreach($reviews as $review) { 
		echo '<p><a href="/Reviews/get_book/' . $review['book_id'] . '">' . $review['title']. "</a></p>";
 	} 

	echo "</div>"
?>