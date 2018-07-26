<html>
<head>
	<title>Hello</title>
	<link rel="stylesheet" type="text/css" href="CSS/default.css">
</head>
<body>
	<?php
		if(isset($_POST['reglog'])) {
			session_start();
$errors = array();			$mobile = $_POST['mobile'];
			$_SESSION['ms'] = $mobile;
			include 'con.php';
			if(empty($mobile)){
				array_push($errors , "Mobile Number is Empty");
			}
			else if(!preg_match("/^\d{10}+$/", $mobile)){
				array_push($errors , "Enter only 10 digit numbers");
			}
			else{
				$result = mysqli_query($con,"select mobile from buyer where mobile = '$mobile'");
				$resultset = mysqli_fetch_row($result);
				if($resultset[0] == $mobile) {
					header('Location: logbuyer.php');
				} 
				else {
					header('Location: regbuyer.php');
				}
			}
		}
	?>
	<div class="header">
		<h3>Online Auction</h3>
	</div>
	<form action="reglog.php" method="POST">
   <?php include 'errors.php'; ?> 		
<div class="input-group">
			<label> Enter Mobile: </label>
			<input type="text" name="mobile" placeholder="Enter Mobile Number">
		</div>
		<div >
			<input type="submit"  class="btn" name="reglog" value="Continue">	
		</div>	
	</form>
</body>

</html>
