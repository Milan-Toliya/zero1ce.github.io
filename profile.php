<?php
  include 'session.php';

  $msgs = array();
  $warns = array();
  $errors = array();

  $query = "select * from user where userID = '$userID'";
  $resultset = mysqli_query($conn,$query);
  $resultset = mysqli_fetch_row($resultset);

  setcookie("resultsetProfile",serialize($resultset), time() + (86400 * 30), "/"); 
  $_SESSION['edituser'] = $resultset;
 	if (isset($_SESSION['msgs'])) {
  	array_push($msgs, $_SESSION['msgs']);
  	unset($_SESSION['msgs']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Your Profile</title>

  <?php include 'link.php'; ?>

</head>
<body>

  <?php include 'navlog.php'; ?>

  <div style="max-width: 800px;" class="container">
    <div>
       <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Online Auction</h3>
    </div>
    <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
      <!-- inlclude msg,warn,err --> 
      <?php include 'msgs.php'; include 'errors.php'; include 'warnings.php'; ?>
    <form class="content" action="delete.php" method="POST">

    <div style="padding-bottom: 15px;" class="container">
      <img class="rounded-circle" width="200" height="200" style="margin-left: auto; margin-right: auto; border: 1px solid #17a2b8; display: block;" alt="Your Profile" src = <?php echo "profileIMG/$resultset[8]"; ?> >
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span style="width: 135px;" class="input-group-text">First Name</span>
      </div>
      <input style="background-color: white;" type="text" class="form-control"  name="fname" value="<?php echo $resultset[1] ?>" disabled>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span style="width: 135px;" class="input-group-text">Last Name</span>
      </div>
      <input style="background-color: white;" type="text" class="form-control"  name="lname" value="<?php echo $resultset[2] ?>" disabled>
    </div>
     
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span style="width: 135px;" class="input-group-text">E-mail</span>
      </div>
      <input style="background-color: white;" type="text" class="form-control"  name="email" value="<?php echo $resultset[3] ?>" disabled>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span style="width: 135px;" class="input-group-text">Mobile Number</span>
      </div>
    <input style="background-color: white;" type="text" class="form-control"  name="mobile" value="<?php echo $resultset[4] ?>" disabled>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span style="width: 135px;" class="input-group-text">Date Of Birth</span>
      </div>
      <input style="background-color: white;" type="date" class="form-control"  name="dob" value="<?php echo $resultset[5] ?>" disabled>
    </div>

    <div style="text-align: center;">
        <button style="width: 100%; margin-bottom: 5px;" type="" class="btn btn-secondary" name="editProfile" value="Edit Profile">Edit Profile</button>
        <button style="width: 49%;" type="submit" class="btn btn-secondary" name="del" value="Delete Account">Delete Account</button>
        <button style="width: 49%;" type="submit" class="btn btn-secondary" name="logout" value="Logout">Logout</button>
    </div>
  </form>
  </div>
</div>

  <?php include 'footer.php'; ?>

</body>
</html>