<?php
  session_start();
	$con = mysqli_connect("localhost","root","","onlineauction");
	if(isset($_POST['login'])) {
		$mobile  = $_POST['mobile'];
		$password  = $_POST['password'];

    $_SESSION['user'] = array($mobile , $password);

			$query = "SELECT * FROM buyer WHERE mobile = '$mobile' AND password = '$password'";
			$result = mysqli_query($con , $query);

			if(mysqli_num_rows($result) == 1) {
				echo "welcome";
				//$_SESSION['mobile'] = $mobile;
				echo "<a href = 'profile.php'> go to profile </a> ";
			}
			else {
				echo '<script>alert("Incorrect mobile number or password");</script>';
			}

		/*if($con->query($insetQuery) === TRUE) {
			echo "insert SUCESSFULL";
		}
		else {
			echo "error ".$insertQuery. "<br/>".$con->error ;
		}
		$con->close(); */
}

?>
