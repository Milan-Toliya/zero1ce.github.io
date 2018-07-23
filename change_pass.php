<?php
	include 'session.php';
	// include 'conn.php';
	// session_start();

	$msgs = array();
	$warns = array();
	$errors = array();

	if(isset($_POST['change_pass'])) {
		$opass = $_POST['oldPassword'];
		$opass= md5($opass);
		$npass = $_POST['newPassword'];
		$cpass = $_POST['password'];
		$password = mysqli_query($conn,"SELECT password FROM user WHERE userID = '$userID'");
		$resultset = mysqli_fetch_row($password);
		if($resultset[0] == $opass){
			if($npass != ''){
				if($npass == $cpass){
					$npass=md5($npass);
					$updateQuery = mysqli_query($conn ,"UPDATE user SET password = '$npass' WHERE userID = '$userID'");
					if ($updateQuery) {
						$_SESSION['msgs'] = "Password Changed Successfully" ;      
						header('location:profile.php');
					}
				}else {	array_push($errors ,  "Confirm Password did not match"); }
			}else {	array_push($errors , "password filed must not be empty"); }
		}else{ array_push($errors , "old password is wrong"); }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Change Password</title>

  <?php include 'link.php'; ?>

</head>
<body>
 
  	<?php include 'navlog.php'; ?>
  	<div style="max-width: 800px;" class="container">
        <div>
           <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Change Password</h3>
        </div>
       <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
				<!-- inlclude msg,warn,err --> 
	        <?php include 'msgs.php'; include 'errors.php'; include 'warnings.php'; ?>
			<form class="content" action="" method="POST">
				<div class="input-group mb-3">
		            <div class="input-group-prepend">
		    	        <span style="width: 120px;" class="input-group-text"><i style="margin-right: 5px;" class="fa fa-lock"></i>Old</span>
	    	         	<div  class="input-group">
					    	<input size="100" class="form-control" name="oldPassword" placeholder="Old Password" type="password">
					    </div>
		    	    </div>
		        </div>
				<div class="input-group mb-3">
		            <div class="input-group-prepend">
		    	        <span style="width: 120px;" class="input-group-text"><i style="margin-right: 5px;" class="fa fa-lock"></i>New</span>
	    	         	<div  class="input-group">
					    	<input size="100" class="form-control" name="newPassword" placeholder="New Password" type="password">
					    </div>
		    	    </div>
		        </div>
					
				<div class="input-group mb-3">
		            <div class="input-group-prepend">
		    	        <span style="width: 120px;" class="input-group-text"><i style="margin-right: 5px;" class="fa fa-lock"></i>Confirm</span>
	    	         	<div  class="input-group" id="show_hide_password">
					    	<input size="100" class="form-control" name="password" placeholder="Confrirm Password" type="password">
					      	<span class="input-group-text">
					        	<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
					      	</span>
					    </div>
		    	    </div>
		        </div>
					
				<script type="text/javascript">
					$	(document).ready(function() {
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
					<button style="width: 100%;" type="submit" class="btn btn-secondary" name="change_pass" value="change_pass">Change Password</button>
				</div>
			</form>
		</div>
	</div>

<?php include 'footer.php'; ?>

</body>
</html>
