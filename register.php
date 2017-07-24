<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	
	<div class="wrapper">
		<form method="post" action="register.php" class="form-signin">
			<h2 class="form-signin-heading">Sign Up</h2>
			<?php include('errors.php'); ?>
			<input type="text" class="form-control" name="username"  placeholder="Username" autofocus="" value="<?php echo $username;?>" />
			<input type="email" class="form-control" name="email" placeholder="Email"  value="<?php echo $email;?>" />
			<input type="password" class="form-control" name="password_1" placeholder="Password" />
			<input type="password" class="form-control" name="password_2" placeholder="Confirm Password" />
			<br>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="reg_user">Sign Up</button>  
			<br>
			<p>
				Already a Member? <a href="login.php">Log In</a>
			</p>
		</form>
	</div>
</body>
</html>