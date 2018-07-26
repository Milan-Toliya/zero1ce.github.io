<?php 
session_start();
	if (isset($_SESSION['msg'])) {
		$msgs =array();
		array_push($msgs, $_SESSION['msg']);
		unset($_SESSION['msg']);
	}
	include 'con.php';
	if(isset($_POST['login'])) {
		$mobile  = $_POST['mobile'];
		$password  = $_POST['password'];
		$password = md5($password);
		$errors = array();
		$query = "SELECT * FROM buyer WHERE mobile = '$mobile' AND password = '$password'";
		$result = mysqli_query($con , $query);
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['ms'] = $mobile;
			$_SESSION['ps'] = $password;
			header('location: home.php');
		}
		else {
			array_push($errors, "invalid mobile or password");
		}
	}
?>
<html>
<head>
	<title>Online Auction Register</title>
	<link rel="stylesheet" type="text/css" href="CSS/default.css">
</head>
<body>
	<div>
	<div class="header">
		<h3>Buyer Login</h3>	
	</div>
	<form action="" method="POST">
		<?php include('errors.php');
			  include('msgs.php');
		 ?>
		<div class="input-group">
			<label> Mobile Number:</label>
			<input type="text" name="mobile" placeholder="Enter Mobile Number" value=
				"<?php 	
					if(isset($_SESSION['ms'])){	echo $_SESSION['ms']; }
					else{ echo "";}
				?>"
			>
		</div>
		<div class="input-group">
			<label> Enter Your Password: </label>
			<input type="password" name="password" id="pwd" placeholder="Enter password"> 
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
		<div >
			<input class="btn" type="submit" name="login" value="login">
			<a style="text-decoration: none; text-align: right;" href= "regbuyer.php"> Are you new user?</a>
		</div>
	</form>
	</div>
</body>
</html>
