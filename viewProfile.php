<?php
	include('server.php');
	include('navbar.php');
	if (!isset($_SESSION['username'])) {
		header('location: login.php');
	}
?>


<?php 
$username =  $_SESSION['username'];
$query = "SELECT * from users where username='$username'";
$res = mysqli_query($db, $query);
while ($obj=mysqli_fetch_object($res))
    {
    echo "Mobile Number: ".$obj->mob_no;
    echo "Date of Birth: ".$obj->dob;
    }
?>