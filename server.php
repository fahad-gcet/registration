<?php 


session_start();

$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";


if (!isset($_SESSION['token'])) {
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
}
else
{
    $token = $_SESSION['token'];
}


$db = mysqli_connect('us-cdbr-iron-east-03.cleardb.net', 'b6cc2d838a8222', '71716e01', 'heroku_321e418d5002cca');
//$db = mysqli_connect('localhost', 'fahad', 'fahad123', 'test_db');

if (isset($_POST['reg_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	$query = "SELECT * from users where username='$username'";
	$res = mysqli_query($db, $query);

	
	if (empty($username)) { array_push($errors, "Username is required"); }
	
	elseif (mysqli_num_rows($res)) {
		array_push($errors, "Username already exists");
	}
	
	$query = "SELECT * from users where email='$email'";
	$res = mysqli_query($db, $query);


	if (empty($email)) { array_push($errors, "Email is required"); }
	elseif (mysqli_num_rows($res)) {
		array_push($errors, "Email already exists");
	}


	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	
	
	if(!($_SESSION['token'] == $_POST['token'])) {
  		die('Invalid CSRF token');
  	}
	else if (count($errors) == 0) {
		$password = password_hash($password_1, PASSWORD_BCRYPT);
		$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($db, $query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}
}




if (isset($_POST['login_user'])) {

	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);	

	if (empty($username)) {
		array_push($errors, "Username is required");
	}

	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// echo $_SESSION['token']. "  ";
	// echo $_POST['token'];

	if(!($_SESSION['token'] == $_POST['token'])) {
  die('Invalid CSRF token');
} else if (count($errors) == 0) {
		$query = "SELECT password FROM users WHERE username='$username'";
		$field = 'password';
		$results = mysqli_query($db, $query);
		$dbpass = mysqli_fetch_object($results)->$field;
		//echo $dbpass or die();

		if (password_verify($password, $dbpass)) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			else {
				array_push($errors, "Wrong username/password combination");
			}
	}
}


if (isset($_POST['edit_user'])) {
	if(!($_SESSION['token'] == $_POST['token'])) {
  die('Invalid CSRF token');
}
  else {
  	$username = $_SESSION['username'];
	$mob_no = mysqli_real_escape_string($db, $_POST['mob_no']);
	$dob = mysqli_real_escape_string($db, $_POST['dob']);
	$query = "UPDATE users SET mob_no= '$mob_no', dob= '$dob' WHERE username='$username'";
	mysqli_query($db, $query);
	header('location: index.php');
  }
	
}






?>