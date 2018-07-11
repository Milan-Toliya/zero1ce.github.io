<?php
include 'session.php';
$errors = array();

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
               $q = mysqli_query($conn ,"update user set img = '$my_name.$ext' where mobile = '$mobile'");
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
     $q = mysqli_query($conn ,"select gender from user where mobile = '$mobile'");
     $q = mysqli_fetch_row($q);
     $img = $q[0].'.png'; 
     $q = mysqli_query($conn ,"update user set img = '$img' where mobile = '$mobile'");
     mysqli_query($conn,$q);
     header('location:editProfile.php');
   }
  }


if(isset($_POST['editProfile'])) {
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
    if(mysqli_num_rows($result) == 1){
      $q = mysqli_query($conn ,"update user set fname = '$fname' where mobile = '$mobile'");
      mysqli_query($conn,$q);
      $q = mysqli_query($conn ,"update user set lname = '$lname' where mobile = '$mobile'");
      mysqli_query($conn,$q);
      $q = mysqli_query($conn ,"update user set email = '$email' where mobile = '$mobile'");
      mysqli_query($conn,$q);
      $q = mysqli_query($conn ,"update user set dob = '$dob' where mobile = '$mobile'");
      mysqli_query($conn,$q);
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
  <a id="logo" class="navbar-brand" href="home.php">Auction</a>
  <form id="f1" class="form-inline" action="/action_page.php" method="POST">
    <input id="inp1" class="form-control mr-sm-2" type="text" placeholder="Search product,brand or more" size="70">
    <button id="btn1" class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
  </form>
  <ul class="navbar-nav">
    <li style="margin-left: 88px;" class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION['us']; ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="profile.php">Profile</a>
        <a class="dropdown-item" href="auctions.php">Auctions</a>
        <a class="dropdown-item" href="orders.php">Orders</a>
        <a class="dropdown-item" href="wishlist.php">Wishlist</a>
        <a class="dropdown-item" href="logout.php">logout</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        More
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="help.php">24*7 help</a>
        <a class="dropdown-item" href="about.php">About</a>
        <a class="dropdown-item" href="advertice.php">Advertice</a>
      </div>
    </li>
  </ul>
</nav>

   <div>
  <div class = "header">
     <h3 style="color: white;"> Edit </h3>
  </div>
  <form id="pform" class="content" action="editProfile.php" method="POST" enctype="multipart/form-data">
    <div> 
      <?php include 'errors.php'; ?>
    </div>
    <div class = "input-group">
         <label> First Name: </label>
         <input type="text" name="fname" value="<?php echo $_SESSION['edituser'][1]; ?>">
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
          <label> DOB: </label> 
          <input type="date" name="dob" value="<?php echo $_SESSION['edituser'][5]; ?>">
    </div>
    <div>
      <label > Profile Picture: </label>
      <input type="file" name="my_file" style="margin-bottom: 10px;" />
      <input class="pbtn" type="submit" name="upload" value="Upload"/>
      <input class="pbtn" type="submit" name="default" value="Default Profile Picture"/>
    </div>
      <input class="pbtn" type="button" name="button" value="Change Password" onclick="window.location.href='change_pass.php'">
     <input class = "pbtn" type="submit" name="editProfile" value="Update Profile">
   </form>
   </div>
 </body>
</html>