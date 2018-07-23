<?php
	session_start();
	$mobile = $_SESSION['ms'];
	$fname ="";
	$gender ="";
	$dob="";
	$lname="";
	$email="";
	$msgs = array();
  	$warns = array();
  	$errors = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Register Page</title>

  
  <?php include 'link.php'; ?>

</head>
<body>
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

  <?php include 'nav.php'; ?>

<div style="max-width: 800px;" class="container">
        <div>
           <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Registarion</h3>
        </div>
       <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; border: solid 1px #e1e2e3; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
       	<form class="content" action="" method="POST">
       		 <?php include 'msgs.php';include 'errors.php'; ?>

       		 <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;"><sup style="color: red;">*</sup> First Name</span>
	            </div>
	            <input type="text" class="form-control" placeholder="First Name"  name="fname" value="<?php echo $fname; ?>" >
	         </div>

       		 <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;"><sup style="color: red;">*</sup> Last Name</span>
	            </div>
	            <input type="text" class="form-control" placeholder="Last Name"  name="lname" value="<?php echo $lname; ?>" >
	         </div>	         

       		 <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;">Gender </span>
	            </div>
			  <select class="form-control" name="gender">
			    <option value="m">Male</option>
			    <option value="f">Female</option>
			  </select>
	         </div>

			 <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;"><sup style="color: red;">*</sup> Mobile </span>
	            </div>
	            <input type="text" class="form-control" placeholder="Mobile Number"  name="mobile" value="<?php echo $mobile; ?>" >
	         </div>	    

			 <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;"> E-mail </span>
	            </div>
	            <input type="text" class="form-control" placeholder="Email Address"  name="email" value="<?php echo $email; ?>" >
	         </div>	    

			 <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;"> DOB </span>
	            </div>
	            <input type="date" class="form-control" placeholder="Date of Birth"  name="dob" value="<?php echo $dob; ?>" >
	         </div>	    


			 <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;"> Password </span>
	            </div>
	            <input type="password" class="form-control" placeholder="password"  name="password1" >
	         </div>	    

			<div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 115px;"> Confirm Pass. </span>
    	         	<div  class="input-group" id="show_hide_password">
				      <input size="100" class="form-control" name="password2" placeholder="Confirm Password" type="password">
				      <span class="input-group-text">
				        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
				      </span>
				    </div>
	    	    </div>
	        </div>
				
			<script type="text/javascript">
				$(document).ready(function() {
			    $("#show_hide_password a").on('click', function(event) {
			        event.preventDefault();
			        if($('#show_hide_password input').attr("type") == "text"){
			            $('#show_hide_password input').attr('type', 'password');
			            $('#show_hide_password i').addClass( "fa-eye-slash" );
			            $('#show_hide_password i').removeClass( "fa-eye" );
			        }else if($('#show_hide_password input').attr("type") == "password"){
			            $('#show_hide_password input').attr('type', 'text');
			            $('#show_hide_password i').removeClass( "fa-eye-slash" );
			            $('#show_hide_password i').addClass( "fa-eye" );
			        }
			    });
			});
			</script>

	        <div>
            <button style="width: 100%;" type="submit" class="btn btn-secondary" name="register" value="Register">Register</button>
    		<a style="text-decoration: none; text-align: right;" href="log.php"> You have already register? </a>
	        </div>
		</form>
    </div>
</div>

	
   <?php include 'footer.php'; ?>

  </body>
  </html>