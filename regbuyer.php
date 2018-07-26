<?php

	function validate_mobile($mobile){
		return preg_match('/^[0-9]{10}+$/',$mobile);
	}
	$con = mysqli_connect("localhost","root","","onlineauction");
	if(isset($_POST['register'])) {
		$fname  = $_POST['fname'];
		$lname = $_POST['lname'];
		$mobile  = $_POST['mobile'];
		$email  = $_POST['email'];
		$dob = $_POST['dob'];
		$password1  = $_POST['password1'];
		$password2  = $_POST['password2'];
		/*echo var_dump($fname);
		echo var_dump($lname);
		echo var_dump($mobile);
		echo var_dump($email);
		echo var_dump($password); */
		if($fname == "") {
				echo '<script>alert("First name is required");</script>';
		}
		else if($lname == "") {
				echo '<script>alert("Last name is required");</script>';
		}
		else if(empty($mobile)){
	      echo '<script>alert("Mobile Number is Empty");</script>';
	    }
		else if(!preg_match("/^\d{10}+$/", $mobile)){
	      echo '<script>alert("Enter only 10 digit numbers");</script>';
	    }
		else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email) && !empty($email)) {
				echo '<script>alert("Invalid email id");</script>';
			}
		else if($password1 !== $password2 || $password1 == "" || $password2 == "" ) {
				echo '<script>alert("Password does not match");</script>';
		}
		else {
			$insertQuery = "INSERT INTO buyer (fname, lname, mobile, password, email , dob ) VALUES ('$fname' , '$lname' , '$mobile' ,   '$password1' , '$email' , '$dob')";

		/*if($con->query($insetQuery) === TRUE) {
			echo "insert SUCESSFULL";
		}
		else {
			echo "error ".$insertQuery. "<br/>".$con->error ;
		}
		$con->close(); */
		mysqli_query($con,$insertQuery);
		echo "SUCESSFULL"."<br/>";

	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
	<div id="wrapper">
		<h3>Buyer Registarion</h3>
		<form action="" method="POST">
		<label> First Name: <br/> <input type="text" name="fname" placeholder="First Name"> <br/> </label>
		<label> Last Name: <br/> <input type="text" name="lname" placeholder="Last Name"> <br/> </label>
		<label> Mobile Number: <br/> <input type="text" name="mobile" placeholder="Mobile number"><br/></label>
		<label> E-mail: <br/> <input type="text" name="email" placeholder="optional"><br/> </label>
		<label> DOB: <br/> <input type="date" name="dob"> <br/> </label>
		<label> Password: <br/> <input type="password" name="password1" placeholder="Create Password"><br/> </label>
		<label> Confirm Password: <br/>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
                                   &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp
		<input type="password" id="pwd" name="password2" placeholder="Confirm Password"><input type="checkbox" onclick="showpwd();"> show password<br/> </label>
		<input type="submit" name="register" value="Create Account">
	</form>
	</div>
	<a href="logbuyer.html"> You have already register? </a>
<script>
	function showpwd(){
		var x = document.getElementById("pwd");
		if(x.type === "password") {
			x.type = "text";
		}
		else {
			x.type = "password";
		}
	}
</script>
</body>
</html>
