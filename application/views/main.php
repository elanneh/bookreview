<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
</head>
<body>
	<h1>Welcome!</h1>
	<div id="register">
		<h2>Register</h2>
		<form action="/Users/register" method="post">
			<p>Name: <input type="text" name="name"></p>
			<p>Alias: <input type="text" name="alias"></p>
			<p>Email: <input type="text" name="email"></p>
			<p>Password: <input type="password" name="password"></p>
			<p>**Password should be at least 8 characters</p>
			<p>Confirm Password: <input type="password" name="confirm_password"></p>
			<p><input type="submit" value="Register"></p>
		</form>		
	</div>

	<div id="login">
		<h2>Login</h2>
		<form action="/Users/login" method="post">
			<p>Email: <input type="text" name="email"></p>
			<p>Password: <input type="password" name="password"></p>
			<p><input type="submit" value="Login"></p>
		</form>
	</div>		
	<p>
	<?php 
		if(!empty($this->session->flashdata('message')))
		{
			echo $this->session->flashdata('message');
		} 
	?>
	</p>

</body>
</html>