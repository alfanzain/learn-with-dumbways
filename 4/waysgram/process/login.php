<?php
require_once('../config/database.php');

if ($conn->connect_error) {
	echo 500;
} 
else 
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Check from database
	$query = $conn->query("SELECT * FROM users_tb WHERE email = '".$email."' AND password = '".$password."'");

	if($query->num_rows > 0) {
		session_start();
		
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $query->fetch_array(MYSQLI_ASSOC)['id'];
		
		echo 1;
	} else {
		echo 2;
	}
}

?>