<!DOCTYPE html>
<?php include('server.php') ?>

<?php
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<html>
<head>
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	
	<div class="wrapper">
		<form method="post" action="register.php" class="form-signin">
			<h2 class="form-signin-heading">Edit Profile</h2>
			<?php include('errors.php'); ?>
			<input type="number" class="form-control" name="mob_no"  placeholder="Mobile Number" />
			<input type="date" class="form-control" name="dob"  placeholder="Date Of Birth" />
			<!-- <input type="hidden" name="token" value="<?php echo $token; ?>"> -->
			<br>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="edit_user">Edit Profile</button>  
		</form>
	</div>
</body>
</html>