<?php
  include 'session.php';

  if(isset($_POST['upload'])) {
    if (($_FILES['my_file']['name']!="")) {
    // Where the file is going to be stored
      $target_dir = "uploads/";
      $file = $_FILES['my_file']['name'];
      $path = pathinfo($file);
      $errors = array();
      $filename = $path['filename'];
      $ext = $path['extension'];
      $my_name = rand(0,100000).rand(0,100000).rand(0,100000).time();
      $size = $_FILES['my_file']['size'];
          if($size != 0) {
            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'bmp') {
            $temp_name = $_FILES['my_file']['tmp_name'];
            $path_filename_ext = $target_dir.$my_name.".".$ext;
              if(mysqli_num_rows($result) == 1){
               $q = mysqli_query($con ,"update buyer set img = '$my_name.$ext' where mobile = '$mobile'");
               mysqli_query($con,$q);
               move_uploaded_file($temp_name,$path_filename_ext);
               $_SESSION['msg']="Picture Uploaded Successfully.";
               header('location:profile.php');
             }else{ array_push($errors,"something went wrong" );}
         }else { array_push($errors,"file is not not image" ) ;}
        }else { array_push($errors,"file size must be less than 20MB");}
    }
  }
  if(isset($_POST['default'])) {
    if(mysqli_num_rows($result) == 1){
     $q = mysqli_query($con ,"update buyer set img = '0.ico' where mobile = '$mobile'");
     mysqli_query($con,$q);
     $_SESSION['msg']= "Default Profile Picture Successfully.";
     header('location:profile.php');
   }
  }
?>

<html>
<head>
  <title> Upload image in online Auction </title>
  <link rel="stylesheet" type="text/css" href="CSS/default.css">
</head>
<body>
  <div>
    <div class="header">
      <h3>Change Image</h3>
    </div>
  <form action="change_image.php" name="upload" method="post" enctype="multipart/form-data" >
    <?php
    include 'errors.php';
    ?>
    <input type="file" name="my_file" />
    <input style="width:75px; height: 30px;" class="btn" type="submit" name="upload" value="Upload"/>
    <form action="change_image.php" name='default' method="post">
      <input style="width:75px; height: 30px;" class="btn" type="submit" name="default" value="Default"/>
    </form>
  </form>
  
  </div>
</body>
</html>
