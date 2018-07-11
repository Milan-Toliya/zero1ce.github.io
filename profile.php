<?php 
  include 'session.php'; 
  $msgs =array();
  if (mysqli_num_rows($result) == 1){
    $query = "select * from user where mobile = '$mobile'";
    $resultset = mysqli_query($conn,$query);
  }
  $resultset = mysqli_fetch_row($resultset);
  $_SESSION['edituser'] = $resultset;
 	if (isset($_SESSION['msg'])) {
  	array_push($msgs, $_SESSION['msg']);
  	unset($_SESSION['msg']);
  }
?>

<html>
  <head>
  <title> Welcome to online auction </title>
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
        <div class="header">
           <h3 style="color: white;">Your Profile</h3>
        </div>
        <form id="pform" class="content" action="delete.php" method="post">
        <?php include 'msgs.php'; ?>
        <div class="container">
          <img class="rounded-circle" width="200" height="200" style="margin-left: auto; margin-right: auto; border: 1px solid #17a2b8; display: block;" alt="Your Profile" src = <?php echo "profileIMG/$resultset[8]"; ?> >
        </div>

        <div class="input-group">
          <label>Fast Name :</label>
          <input type="text" name="fname" value="<?php echo $resultset[1] ?>" disabled>
        </div>

         <div class="input-group">
          <label>Last Name :</label>
          <input type="text" name="lname" value="<?php echo $resultset[2] ?>" disabled>
        </div>

         <div class="input-group">
          <label>Email-id :</label>
          <input type="text" name="fname" value="<?php echo $resultset[3] ?>" disabled>
        </div>

         <div class="input-group">
          <label>Mobile Number :</label>
          <input type="text" name="fname" value="<?php echo $resultset[4] ?>" disabled>
        </div>

         <div class="input-group">
          <label>Date Of Birth :</label>
          <input type="text" name="fname" value="<?php echo $resultset[5] ?>" disabled>
        </div>
        <input class="pbtn" type="button" name="editprofile" value="Edit Profile" onclick="window.location.href='editProfile.php'">
        <input  class="pbtn" type ="submit" name="del" value="Delete account">
          <form action="" method="post">
            <input class="pbtn" type ="submit" name="logout" value="Logout">
          </form>
      </form>
    </div>
  </body>
</html>
