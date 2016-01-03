<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Add a Book and Review</title>
</head>
<body>
	<p><a href="/Users/welcome">Home</a></p>
	<p><a href="/Users/logout">Logout</a></p>

	<h1>Add a New Book Title and a Review:</h1>

	<form action="/Reviews/add_book_and_review" method="post">

		<p>Book Title: <input type="text" name="title"></p>
		<p>Author:
		<select>
				<?php 

				$authors =  $this->db->query("SELECT * FROM books")->result_array();

				foreach ($authors as $author)
				{ ?>
				<option value="<?= $author['author']; ?>" name="author"><?= $author['author']; ?></option>;
	<?php	} ?> 
		</select>	
		</p>
		<p>Or add a New Author: <input type="text" name="author"></p>
		<p>Review:<textarea name="content"></textarea></p>
		<p>Rating: </p>
			<select name="rating">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>	
			<input type="hidden" name="user_id"

		<p><input type="submit" value="Add Book and Review"></p>
	</form>	
	<?= $this->session->flashdata('message');
	?>

</body>
</html>