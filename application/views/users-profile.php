<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>User Reviews</title>
</head>
<body>
	<p><a href="/Users/welcome">Home</a></p>
	<p><a href="/Reviews/index">Add Book and Review</a></p>
	<p><a href="/Users/logout">Logout</a></p>

	<h2>User Alias: <?= $user[0]['alias']; ?></h2>
	<h3>Name: <?= $user[0]['name']; ?></h3>
	<h3>Email: <?= $user[0]['email']; ?></h3>
	<h3>Total Reviews: <?= count($user); ?></h3>

	<h3>Posted reviews on the following books:</h3>
	<?php 

	for($i=0; $i<3; $i++)
	 {
		echo "<p><a href='/Reviews/get_book/" . $user[$i]['book_id'] . "''>" . $user[$i]['title'] . "</a></p>";
	 } ?>
</body>
</html>
