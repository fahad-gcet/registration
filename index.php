<?php 
	session_start();

	$_SESSION['msg'] = "";

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['token']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		body {
  padding-bottom: 20px;
}
	</style>
</head>
<body>
<?php include('navbar.php') ?>
<!-- <?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?> -->
	
	<div class="content">


		
		<?php  if (isset($_SESSION['username'])) : ?>
			<div class="jumbotron">
      <div class="container">
      

        <h1>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></h1>
        <p>This is your peronsal dashboard</p>
        
        
      </div>
    </div>
			
			<!-- <p> <a href="viewProfile.php" class="btn btn-primary btn-lg">View Profile</a> </p> -->
<!-- 			<p> <a href="profile.php" class="btn btn-primary btn-lg">Edit Profile</a> </p>
			<p> <a href="index.php?logout='1'" class="btn btn-primary btn-lg">Logout</a> </p> -->
		<?php endif ?>
	</div>	
</body>
</html>