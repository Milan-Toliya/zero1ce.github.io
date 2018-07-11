<?php
  include 'session.php';
  $errors = array();
  if(isset($_POST['upload'])) {
    if (($_FILES['my_file']['name']!="")) {
    // Where the file is going to be stored
      $target_dir = "uploads/";
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
               $_SESSION['msg']="Picture Uploaded Successfully.";
               header('location:profile.php');
              }else{ array_push($errors,"something went wrong" );}
            }else { array_push($errors,"file is not not image" ) ;}
        }else { array_push($errors,"file size must be less than 20MB");}
    }else{ array_push($errors,"please browse the file");}
  }
  if(isset($_POST['default'])) {
    if(mysqli_num_rows($result) == 1){
     $q = mysqli_query($conn ,"update user set img = 'male.png' where mobile = '$mobile'");
     mysqli_query($conn,$q);
     $_SESSION['msg']= "Default Profile Picture Successfully.";
     header('location:profile.php');
   }
  }
?>

<html>

<head>

  <title> Upload image in online Auction </title>
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
    <li class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION['ms']; ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="profile.php"> Profile</a>
        <a class="dropdown-item" href="#">Order</a>
        <a class="dropdown-item" href="#">WishList</a>
        <form action="delete.php" method = POST>
        <input class="btn1" type ="submit" name="logout" value="Logout">
        </form>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        More
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#"> 24*7 help</a>
        <a class="dropdown-item" href="#">About</a>
        <a class="dropdown-item" href="#">Advertice</a>
      </div>
    </li>
  </ul>
</nav>

  <div>
    <div class="header">
      <h3 style="color: white;">Change Image</h3>
    </div>
  <form id="pform" class="content" action="change_image.php" name="upload" method="post" 
  enctype="multipart/form-data" >
    <?php
    include 'errors.php';
    ?>
    <input type="file" name="my_file" style="width: 200px;" />
    <input style="width:75px; height: 30px;" class="pbtn" type="submit" name="upload" value="Upload"/>
    <form action="change_image.php" name='default' method="post">
      <input style="width:75px; height: 30px;" class="pbtn" type="submit" name="default" value="Default"/>
    </form>
  </form>
  
  </div>
</body>
</html>
