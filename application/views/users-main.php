<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Books Home</title>
</head>
<body>

	<div id="controls">
		<h1>Welcome, <?= $this->session->userdata('alias'); ?></h1>
		<p><a href="/Reviews/index">Add Book and Review</a></p>
		<p><a href="/Users/logout">Logout</a></p>
	</div>

	<div id="reviews">
		<h2>Recent Books Reviews:</h2>
		<?php 
		for($i=0; $i<3; $i++)
		{ ?>
		
		<ul><h3><a href="/Reviews/get_book/<?= $reviews[$i]['book_id']; ?>"><?= $reviews[$i]['title']; ?></a></h3>
			<li>Rating: <?= $reviews[$i]['rating']; ?></li>
			<li><a href="/Users/view_user/<?= $reviews[$i]['user_id']; ?>"><?= $reviews[$i]['name']; ?> </a> says: <?= $reviews[$i]['content']; ?></li>
			<li>Posted on date: <?= $reviews[$i]['created_at']; ?></li>
		</ul>
		<?php } ?>

	</div>
			
</body>
</html>