<?php 
  session_start();	
  $msgs = array();
  $warns = array();
  $errors = array();

	if (isset($_SESSION['msg'])) {
		array_push($msgs, $_SESSION['msg']);
		unset($_SESSION['msg']);
	}
	include 'conn.php';
	if(isset($_POST['login'])) {
		$mobile  = $_POST['mobile'];
		$password  = $_POST['password'];
		$password = md5($password);
		$query = "SELECT * FROM user WHERE mobile = '$mobile' AND password = '$password'";
		$result = mysqli_query($conn , $query);
		$resultset = mysqli_fetch_row($result);
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['ui'] = $resultset[0];
			$_SESSION['us'] = $resultset[1];
			header('location: index.php');
		}
		else {
			array_push($errors, "invalid mobile or password");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Login Page</title>
 
  <?php include 'link.php'; ?>

</head>
<body>

  <?php include 'nav.php'; ?>

	
	<div style="max-width: 800px;" class="container">
        <div>
           <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Online Auction</h3>
        </div>
       <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
				<!-- inlclude msg,warn,err --> 
	        <?php include 'msgs.php'; include 'errors.php'; include 'warnings.php'; ?>
	        <form id="pform" class="content" action="" method="POST">
			<div class="input-group mb-3">
	            <div class="input-group-prepend">
	            	<span class="input-group-text"><i class="fa fa-mobile-phone" style="font-size:24px"></i></span>
	            </div>
	            <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile" value="">
	        </div>
			<div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text"><i class="fa fa-lock"></i></span>
    	         	<div  class="input-group" id="show_hide_password">
				    	<input size="100" class="form-control" name="password" placeholder="Password" type="password">
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
	          <button style="width: 100%;" type="submit" class="btn btn-secondary" name="login" value="Login">Login</button>
	        </div>

			</form>
	    </div>	
	</div>
<?php include 'footer.php'; ?>

</body>
</html>