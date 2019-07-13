<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styleregist.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>
		<div class="atas">
			<h1>REGISTER</h1>
		</div>
	<form action="proses_register.php" method="POST">
	<div>
		<h5>Register Your Account</h5>	
		<div class="form-row">
			<div class="form-goup col-md-6">	
				<input type="text" name="name" class="form-control" placeholder="Full Name"><br>
			</div>
			<div class="form-goup col-md-6">
				<input type="text" class="form-control" name="username" placeholder="Username"><br>	
			</div>
		</div>
		<div class="form-row">
			<div class="form-goup col-md-6">		
				<input type="text" name="email" class="form-control" placeholder="Email"><br>
			</div>	
			<div class="form-goup col-md-6">
				<select class="form-control" name="role">
				<option value="1" name="role">User</option>
				<option value="2" name="role">Company</option>
				</select><br>
			</div>
		</div>	
		<div class="form-row">
			<div class="form-goup col-md-6">		
				<input type="password" name="password" class="form-control" placeholder="Password"><br>
			</div>
			<div class="form-goup col-md-6">
				<input type="password" name="repassword" class="form-control" placeholder="Re-Password"><br>
			</div>
		</div>
			<button class="btn btn-success" type="submit" name="submit">Register</button>
	</div>	
	</form>
</body>
</html>