<?php
session_start();
	
  $msgs = array();
  $warns = array();
  $errors = array();

  //   if (isset($_SESSION['warns'])) {
  //   array_push($warns, $_SESSION['warns']);
  //   unset($_SESSION['warns']);
  // }
  //   if (isset($_SESSION['msgs'])) {
  //   array_push($msgs, $_SESSION['msgs']);
  //   unset($_SESSION['msgs']);
  // }
  //   if (isset($_SESSION['errors'])) {
  //   array_push($errors, $_SESSION['errors']);
  //   unset($_SESSION['errors']);
  // }
  
	if(isset($_POST['reglog'])) {
		include 'conn.php';
		$mobile = $_POST['mobile'];
		if(empty($mobile)){
			array_push($errors , "Mobile Number is Empty");
		}
		else if(!preg_match("/^\d{10}+$/", $mobile)){
			array_push($errors , "Enter only 10 digit numbers");
		}
		else{
			$result = mysqli_query($conn,"select mobile from user where mobile = '$mobile'");
			$resultset = mysqli_fetch_row($result);
			if($resultset[0] == $mobile) {
				header('Location:log.php');
			} 
			else {
				header('Location:reg.php');
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Login & Signup</title>

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
			<form id="pform" class="content" action="reglog.php" method="POST">
	          <div class="input-group mb-3">
	            <div class="input-group-prepend">
	              <span class="input-group-text"><i class="fa fa-mobile-phone" style="font-size:24px"></i></span>
	            </div>
	            <input type="text" class="form-control" placeholder="Enter Mobile Number" id="usr" name="mobile" value="">
	          </div>
			<div>
	          <button style="width: 100%;" type="submit" class="btn btn-secondary" name="reglog" value="Continue">Continue</button>
	        </div>
			</form>
        </div>
    </div>

  <?php include 'footer.php'; ?>

  </body>
  </html>
