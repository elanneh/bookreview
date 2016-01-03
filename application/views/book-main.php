<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?= $book['title']; ?></title>
</head>
<body>

	<div id="controls">
		<p><a href="/Reviews/index">Add Book and Review</a></p>
		<p><a href="/Users/logout">Logout</a></p>
	</div>

	<div id="bookinfo">
		<h1><?= $book['title']; ?></h1>
		<h3><?= $book['author']; ?></h3>
	</div>	

	<div id="reviews">
		<h2>Reviews:</h2>

	<?php

	foreach($review as $review)
	{ ?>
			<p>Rating: <?= $review['rating']; ?></p>		
			<p><a href="/Users/view_user/<?= $review['user_id']; ?>"><?= $review['name']; ?> </a> says: <?= $review['content']; ?></p>
			<p>Posted on date: <?= $review['created_at']; ?></p>
			<?php 
			echo $this->session->userdata('user_id');

			if($review['user_id'] == $this->session->userdata('id'))
			{ ?>
			<form action="/Reviews/delete_review" method="post">
				<input type="hidden" name="id" value="<?= $review['id']; ?>">
				<input type="hidden" name="book_id" svalue="<?= $book['id']; ?>">
				<input type="submit" value="Delete this review">
			</form>
			<?php 
			}
		} ?>
	</div>

	<div id="addreview">
	<form action="/Reviews/add_review" method="post">
		<p>Add a Review:</p>
		<textarea name="content"></textarea>
		<p>Rating: </p>
			<select name="rating">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>	
		<input type="hidden" name="book_id" value="<?= $book['id']; ?>">

		<p><input type="submit" value="Submit Review"></p>
	</form>	

	<?= 
	$this->session->flashdata('message');
	?>

</body>
</html>