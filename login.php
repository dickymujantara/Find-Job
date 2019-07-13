<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>
	<div class="tubuh">
		<div class="atas">
		<h1>LOGIN</h1>
		</div>
	<form action="proses_login.php" method="post" autocomplete="off">
		<div class="form form-group">
			<input type="text" class="form-control"  name="username" placeholder="Username" autofocus autocomplete="off"><br>
			<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off"><br>
			<button type="submit" class="btn btn-success" name="login">Login</button><br>
			<div class="form-check">
			<input class="form-check-input" type="checkbox" value="RememberMe">Remember Me
			</div>
		</div>	
	</form>
	</div>
</body>
</html>