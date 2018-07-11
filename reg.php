<?php
	session_start();
	$mobile = $_SESSION['ms'];
	$fname ="";
	$gender ="";
	$dob="";
	$lname="";
	$email="";
	$errors = array();
?>
<html>

<head>

	<title>Registration in online Auction</title>
	  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/manu.css">
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</head>

<body>

	<script type="text/javascript">
  $(function(){
    $(".dropdown").hover(            
      function() {
        $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
        $(this).toggleClass('open');
        $('b', this).toggleClass("caret caret-up");                
      },
      function() {
        $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
        $(this).toggleClass('open');
        $('b', this).toggleClass("caret caret-up");                
      });
  });  
</script>
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <a id="logo" class="navbar-brand" href="index.php">Auction</a>
  <form id="f1" class="form-inline" action="/action_page.php" method="POST">
    <input id="inp1" class="form-control mr-sm-2" type="text" placeholder="Search product,brand or more" size="70">
    <button id="btn1" class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
  </form>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a id="reglog" class="nav-link" href="reglog.php">Login & Signup</a>
    </li>

    <li class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        More
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="help.php"> 24*7 help</a>
        <a class="dropdown-item" href="about.php">About</a>
        <a class="dropdown-item" href="advertice.php">Advertice</a>
      </div>
    </li>
  </ul>
</nav>

<?php
	if(isset($_POST['register'])) {
		include 'conn.php';
		$userID = uniqid('UID');
		$fname  = $_POST['fname'];
		$lname = $_POST['lname'];
		$mobile  = $_POST['mobile'];
		$email  = $_POST['email'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$img = $gender.'.png';
		$password1  = $_POST['password1'];
		$password2  = $_POST['password2'];
		$_SESSION['ms'] = $mobile;
		$_SESSION['us'] = $fname;
		$resultset = mysqli_query($conn,"select mobile from user where mobile = '$mobile'");
		$resultset = mysqli_fetch_row($resultset);
		if(empty($fname)) {	array_push($errors, "First name is required"); }
		if(empty($lname)) { array_push($errors, "Last name is required"); }
		if(empty($mobile)){	array_push($errors, "Mobile Number is Empty"); }
		if(!preg_match("/^\d{10}+$/", $mobile)){ array_push($errors, "Enter only 10 digit numbers"); }
		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email) && !empty($email)) {array_push($errors, "Invalid email id");}
		if(empty($password1)) { array_push($errors, "Password is required");} 
		else if($password1 !== $password2) { array_push($errors, "Password does not match");}
		if($resultset[0] == $mobile) { array_push($errors, "Mobile number is already registered"); }
		if(count($errors) == 0){
			if($dob != NULL) {
				$password1 = md5($password1);
				$insertQuery = "INSERT INTO user ( userID, fname, lname, mobile, password, email, dob, img, gender) VALUES ('$userID', '$fname' , '$lname' , '$mobile' , '$password1' , '$email' , '$dob' , '$img' , '$gender')";
				mysqli_query($conn,$insertQuery);
				$_SESSION['msg']= "register success";
				header('Location: log.php');
				}else {
				$password1 = md5($password1);
				$insertQuery = "INSERT INTO user (userID,fname, lname, mobile, password, email , dob , img, gender ) VALUES ('$userID', '$fname' , '$lname' , '$mobile' , '$password1' , '$email' , NULL , '$img' , '$gender')";
				mysqli_query($conn,$insertQuery);
				$_SESSION['msg']= "register success";				
				header('Location: log.php');
			}
		}
		
	}
?>

	<div>
		<div class="header">
			<h3 style="color: white;">Registarion</h3>	
		</div>
		<form id="pform" class="content" action="" method="POST">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label> <sup style="color: red;">*</sup> First Name: </label>
				<input type="text" name="fname" placeholder="First Name" value = "<?php echo $fname; ?>"> 
			</div>
			<div class="input-group">
				<label> <sup style="color: red;">*</sup> Last Name: </label>
				<input type="text" name="lname" placeholder="Last Name" value = "<?php echo $lname; ?>">
			</div>

			<div>
				<label> Gender: </label>
				<input style="margin-left: 10px;" type="radio" name="gender" value = "m" checked="checked"> Male
				<input style="margin-left: 10px;" type="radio" name="gender" value = "f"> Female
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
				<input type="password" id="pwd" name="password2" placeholder="Confirm Password" >
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
				<input class="pbtn" type="submit" name="register" value="Register">
				<a style="text-decoration: none; text-align: right;" href="log.php"> You have already register? </a>
			</div>
		</form>
	</div>
	
</body>

</html>
