<?php
if(isset($_POST['editProfile'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $errors = array();
  include 'session.php';

  if(empty($fname)) { array_push($errors, "First name is required"); }
  if(empty($lname)) { array_push($errors, "Last name is required"); }
  if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email) && !empty($email)) {
      array_push($errors,"Invalid email id");
  }
  if(count($errors) == 0 ){
    if(mysqli_num_rows($result) == 1){
      $q = mysqli_query($con ,"update buyer set fname = '$fname' where mobile = '$mobile'");
      mysqli_query($con,$q);
      $q = mysqli_query($con ,"update buyer set lname = '$lname' where mobile = '$mobile'");
      mysqli_query($con,$q);
      $q = mysqli_query($con ,"update buyer set email = '$email' where mobile = '$mobile'");
      mysqli_query($con,$q);
      $q = mysqli_query($con ,"update buyer set dob = '$dob' where mobile = '$mobile'");
      mysqli_query($con,$q);
      $_SESSION['msg']="Profile Update sucessfully";
      unset($_SESSION['edituser']);
      header('location:profile.php');
    } else {
        array_push($errors,"something went wrong / please login again");
    }
  }  
}  
?>

<html>
  <head>
      <title>edit</title>
      <link rel="stylesheet" type="text/css" href="CSS/default.css">
 </head>
 <body>
   <div>
<div class = "header">
     <h3> Edit </h3>
</div>
     <form action="editProfile.php" method="POST" enctype="multipart/form-data">
      <div>
        <?php 
          include 'errors.php';
         ?>
      </div>
<div class = "input-group">
     <label> First Name: </label>
     <input type="text" name="fname" value="<?php  session_start(); echo $_SESSION['edituser'][1]; ?>">
</div>
<div class = "input-group">
     <label> Last Name: </label>  
    <input type="text" name="lname" value="<?php echo $_SESSION['edituser'][2]; ?>">
</div>
<div class = "input-group">
     <label> E-mail: </label>  
<input type="text" name="email" value="<?php echo $_SESSION['edituser'][3]; ?>">

</div>
<div class = "input-group">
     <label> DOB: </label>  <input type="date" name="dob" value="<?php echo $_SESSION['edituser'][5]; ?>">
</div>
     <a style="text-align: center;" href="change_pass.php" target="_blank">Change Password</a> <br>
     <a style="text-align: center;" href="change_image.php" target="_blank">Change Profile Picture</a>
     <input class = "btn" type="submit" name="editProfile" value="Update Profile">
   </form>
   </div>
 </body>
</html>