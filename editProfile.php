<?php
  include 'session.php';

  $msgs = array();
  $warns = array();
  $errors = array();

    if(isset($_COOKIE['resultsetProfile'])){
      $editProfileCookie =  unserialize($_COOKIE['resultsetProfile']);
    }else{
      $_SESSION['msgs'] = "it seems you have disable cookie from your browser some freatures might not work properly.";
      header('location: profile.php');
    }
    if(isset($_POST['upload'])) {
    if (($_FILES['my_file']['name']!="")) {
    // Where the file is going to be stored
      $target_dir = "profileIMG/";
      $file = $_FILES['my_file']['name'];
      $path = pathinfo($file);
      $filename = $path['filename'];
      $ext = $path['extension'];
      $my_name = rand(0,100000).rand(0,100000).rand(0,100000).time();
      $size = $_FILES['my_file']['size'];
          if($size != 0) {
            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'bmp'||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'ICO' || $ext == 'GIF' || $ext == 'BMP') {
               $temp_name = $_FILES['my_file']['tmp_name'];
               $path_filename_ext = $target_dir.$my_name.".".$ext;
              if(mysqli_num_rows($result) == 1){
               $q = mysqli_query($conn ,"update user set img = '$my_name.$ext' where userId = '$userID'");
               mysqli_query($conn,$q);
               move_uploaded_file($temp_name,$path_filename_ext);
               header('location:editProfile.php');
              }else{ array_push($errors,"something went wrong" );}
            }else { array_push($errors,"file is not not image" ) ;}
        }else { array_push($errors,"file size must be less than 20MB");}
    }else{ array_push($errors,"please browse the file");}
  }
  if(isset($_POST['default'])) {
    if(mysqli_num_rows($result) == 1){
     $q = mysqli_query($conn ,"select gender from user where userID = '$userID' ");
     $q = mysqli_fetch_row($q);
     $img = $q[0].'.png'; 
     $q = mysqli_query($conn ,"update user set img = '$img' where userID = '$userID'");
     mysqli_query($conn,$q);
     header('location:editProfile.php');
   }
  }


if(isset($_POST['update'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];

  if(empty($fname)) { array_push($errors, "First name is required"); }
  if(empty($lname)) { array_push($errors, "Last name is required"); }
  if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email) && !empty($email)) {
      array_push($errors,"Invalid email id");
  }
  if(count($errors) == 0 ){
    if(isset($_SESSION['ui'])){
      $updateQuery = mysqli_query($conn ,"UPDATE user SET fname = '$fname' , lname = '$lname' , email = '$email' , dob = '$dob'  where userID = '$userID'");
        $_SESSION['msgs']="Profile update sucessfully";
        header('location:profile.php');
    } else {
        array_push($errors,"something went wrong / please login again");
    }
  }  
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Edit Profile</title>

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
      <form class="content" action="editProfile.php" method="POST" enctype="multipart/form-data">

        <div style="padding-bottom: 15px;" class="container">
          <img class="rounded-circle" width="200" height="200" style="margin-left: auto; margin-right: auto; border: 1px solid #17a2b8; display: block;" alt="Your Profile" src = <?php echo "profileIMG/$editProfileCookie[8]"; ?> >
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span style="width: 135px;" class="input-group-text">First Name</span>
          </div>
          <input style="background-color: white;" type="text" class="form-control"  name="fname" value="<?php echo $editProfileCookie[1]; ?>">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span style="width: 135px;" class="input-group-text">Last Name</span>
          </div>
          <input style="background-color: white;" type="text" class="form-control"  name="lname" value="<?php echo $editProfileCookie[2]; ?>">
        </div>
         
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span style="width: 135px;" class="input-group-text">E-mail</span>
          </div>
          <input style="background-color: white;" type="text" class="form-control"  name="email" value="<?php echo $editProfileCookie[3]; ?>">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span style="width: 135px;" class="input-group-text">Mobile Number</span>
          </div>
        <input style="background-color: white;" type="text" class="form-control"  name="mobile" value="<?php echo $editProfileCookie[4]; ?>">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span style="width: 135px;" class="input-group-text">Date Of Birth</span>
          </div>
          <input style="background-color: white;" type="date" class="form-control"  name="dob" value="<?php echo $editProfileCookie[5]; ?>">
        </div>

        <div style="text-align: center;">
          <input style="width: 45%" class="btn btn-secondary" type="button" name="change_pass" value="Change Password" onclick="window.location.href='change_pass.php'">
            <button style="width: 45%;" type="submit" class="btn btn-secondary" name="update" value="Update">Update</button>
        </div>
      </form>
    </div>
  </div>
  <div>
    <label > Profile Picture: </label>
    <input type="file" name="my_file" style="margin-bottom: 10px;" />
    <input class="pbtn" type="submit" name="upload" value="Upload"/>
    <input class="pbtn" type="submit" name="default" value="Default Profile Picture"/>
  </div>
<?php include 'footer.php'; ?>

</body>
</html>