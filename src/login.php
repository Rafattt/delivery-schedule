<?php

include('db.php');
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
die();
}
	$password = $_POST["password"];
	$username = $_POST["username"];

		$userpass = $password;
		$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND passcode='$userpass'");
		while($row = mysqli_fetch_array($result)) {
			$success = true;
		}
		if($success == true) {
			$_SESSION['username']= $username; 
			$row = array(
				"username" => $username,
				"password" => $password
			);
			setcookie("username", $row["username"], time()+ (60*15),"/");
			setcookie("password", $row["password"], time()+ (60*15),"/");
			setcookie("logged", "1", time()+ (60*15),"/");
			if($username == /*admin1 username*/ || $username == /*admin2 username*/ || $username == /*admin3 username*/ || $username == /*admin4 username*/ || $username == /*admin5 username*/){
				setcookie("admin", 1, time()+ (60*15),"/");
			} else {
				setcookie("admin", 0, time()+ (60*15),"/");
			}

			header("Location: http://localhost:3000/");
		} else {
			
			setcookie("logged", "0", time()+ (60*0.1),"/");
			setcookie("invalid", "Invalid Username or Password. Try Again.", time()+ (60*15),"/");
			header("Location: http://localhost:3000/");
		}
	
	
?>