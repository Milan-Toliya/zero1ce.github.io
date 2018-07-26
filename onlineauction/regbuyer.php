<?php
	session_start();
	$mobile=$_SESSION['ms'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buyer registration in online Auction</title>
	<link rel="stylesheet" type="text/css" href="CSS/default.css">
</head>
<body>
<?php
	if(isset($_POST['register'])) {
		include 'con.php';
		$fname  = $_POST['fname'];
		$lname = $_POST['lname'];
		$mobile  = $_POST['mobile'];
		$email  = $_POST['email'];
		$dob = $_POST['dob'];
		$errors = array();
		$password1  = $_POST['password1'];
		$password2  = $_POST['password2'];
		$_SESSION['ms'] = $mobile;
		$resultset = mysqli_query($con,"select mobile from buyer where mobile = '$mobile'");
		$resultset = mysqli_fetch_row($resultset);
		if(empty($fname)) {	array_push($errors, "First name is required"); }
		if(empty($lname)) { array_push($errors, "Last name is required"); }
		if(empty($mobile)){	array_push($errors, "Mobile Number is Empty"); }
		if(!preg_match("/^\d{10}+$/", $mobile)){ array_push($errors, "Enter only 10 digit numbers"); }
		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email) && !empty($email)) {array_push($errors, "Invalid email id");}
		if($password1 !== $password2 || $password1 == "" || $password2 == "" ) { 
			array_push($errors, "Password does not match");
		}
		if($resultset[0] == $mobile) { array_push($errors, "Mobile number is already registered"); }
		if(count($errors) == 0){
			if($dob != NULL) {
				$password1 = md5($password1);
				$insertQuery = "INSERT INTO buyer (fname, lname, mobile, password, email , dob , img ) VALUES ('$fname' , '$lname' , '$mobile' , '$password1' , '$email' , '$dob' , '0.ico')";
				mysqli_query($con,$insertQuery);
				$_SESSION['msg']= "register sucess";
				header('Location: logbuyer.php');
				}else {
				$password1 = md5($password1);
				$insertQuery = "INSERT INTO buyer (fname, lname, mobile, password, email , dob , img ) VALUES ('$fname' , '$lname' , '$mobile' , '$password1' , '$email' , NULL , '0.ico')";
				mysqli_query($con,$insertQuery);
				$_SESSION['msg']= "register sucess";				
				header('Location: logbuyer.php');
			}
		}
		
	}
?>

	<div>
		<div class="header">
			<h3>Buyer Registarion</h3>	
		</div>
		<form action="" method="POST">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label> <sup style="color: red;">*</sup> First Name: </label>
				<input type="text" name="fname" placeholder="First Name" value = "<?php echo $fname; ?>"> 
			</div>
			<div class="input-group">
				<label> <sup style="color: red;">*</sup> Last Name: </label>
				<input type="text" name="lname" placeholder="Last Name" value = "<?php echo $lname; ?>">
			</div>
			<div class="input-group">
				<label> <sup style="color: red;">*</sup> Mobile Number: </label>
				<input type="text" name="mobile" placeholder="Mobile number" value = "<?php echo $mobile; ?>">
			</div>
			<div class="input-group">
				<label> E-mail: </label>
				<input type="text" name="email" placeholder="optional" value = "<?php echo $email; ?>">
			</div>
			<div class="input-group">
				<label> DOB: </label>
				<input type="date" name="dob" value = "<?php echo $dob; ?>">
			</div>
			<div class="input-group">
				<label> <sup style="color: red;">*</sup> Password: </label>
				<input type="password" name="password1" placeholder="Create Password">
			</div>
			<div class="input-group">
				<label> Confirm Password: </label>
				<input type="password" id="pwd" name="password2" placeholder="Confirm Password">
			</div>
			<div>
				<label style="text-align:left; margin: auto;">Show password</label>
				<input style="height: auto; width:auto; padding: auto; border-radius: auto;" type="checkbox" onclick="showpwd();">
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
			</div>
			<div>
				<input class="btn" type="submit" name="register" value="Register">
				<a style="text-decoration: none; text-align: right;" href="logbuyer.php"> You have already register? </a>
			</div>
		</form>
	</div>
	
</body>
</html>
