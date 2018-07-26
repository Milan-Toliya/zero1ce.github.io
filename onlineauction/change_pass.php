<html>
<head>
	<title> Change password in online auction </title>
	<link rel="stylesheet" type=" text/css" href="CSS/default.css">
</head>
<body >
<?php
if(isset($_POST['changepass'])) {
	$opass = $_POST['opass'];
	$opass= md5($opass);
	$npass = $_POST['npass'];
	$cpass = $_POST['cpass'];
	session_start();
    $errors = array();
	$mobile = $_SESSION['ms'];
	include 'con.php';
	$password = mysqli_query($con,"select password from buyer where mobile = '$mobile'");
	$resultset = mysqli_fetch_row($password);
	if($resultset[0] == $opass){
		if($npass != ''){
			if($npass == $cpass){
				$npass=md5($npass);
				$q = mysqli_query($con ,"update buyer set password = '$npass' where mobile = '$mobile'");
				if ($q) {
					$_SESSION['msg'] = "Password Changed Successfully" ;
                    $_SESSION['ps'] = $npass;        
					header('location:profile.php');
				}
			}else {	array_push($errors ,  "Confirm Password did not match"); }
		}else {	array_push($errors , "password filed must not be empty"); }
	}else{ array_push($errors , "old password is wrong"); }
}
?>
	<div>
    <div class = "header">
    	<h3> Change Password </h3>
    </div>
		<form method="POST" action="">
			<?php include 'errors.php'; ?>
			<div class = "input-group">
				 <label> Old Password: </label>  
				 <input type="password" name="opass">   
			</div>

			<div class = "input-group">
				 <label> New Password: </label>  
				 <input type="password" name="npass">  
			</div>

			<div class = "input-group">
				 <label> Confirm password: </label>  
				 <input type="password" name="cpass">
			</div>
			<div>
				<input class="btn" type="submit" name="changepass" value="Change Password">
			</div>	 	
		</form>
	</div>
			
</body>
</html>
