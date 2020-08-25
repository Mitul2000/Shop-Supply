
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="syle.css">
</head>
<body>
	<video autoplay muted loop id="myVideo">
		<source src="LoginVid.mp4" type="video/mp4">
	</video>
	<div class="container">
		<form class="box" action="checkUser.php" method="POST">
			<h1> Login </h1>
			<div class="form_input">
				<input type="text" name="username" placeholder="Enter your username.">
			</div>
			<div class="form_input">
				<input type="password" name="password" placeholder="Enter your Password.">
			<input type="submit" name="submit" value="LOGIN" class="btn-login">
			
		</form>
		
	</div>
	

</body>
</html>