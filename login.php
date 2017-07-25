<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="wrapper">
		<form method="post" action="login.php" class="form-signin">
			<h2 class="form-signin-heading">Log In</h2>
			<?php include('errors.php'); ?>
			<input type="text" class="form-control" name="username" required="true" placeholder="Username" autofocus="" />
			<input type="password" class="form-control" name="password" required="true" placeholder="Password"/> 
			<br>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login_user">Login</button> 
			<br>
			<p>
				Not a Member? <a href="register.php">Sign Up</a>
			</p> 
		</form>
	</div>
</body>
</html>