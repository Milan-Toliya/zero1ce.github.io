<?php
  include 'session.php';   
  $errors = array();
  if(isset($_POST['delete'])) {
    $password = $_POST['pass'];
    $password = md5($password);
    $mobile = $_SESSION['ms'];
    $ps = $_SESSION['ps'];
    if($password != "") {
      if($password == $ps) {
        $q = "delete from user WHERE mobile = '$mobile'";
        $result = mysqli_query($conn , $q);
        if($result == 1) {
          header('Location:index.php');
        }
      } else { array_push($errors,"Wrong Password");}
    } else { array_push($errors,"Password is empty");}
  } 
?>

<html>

<head>

  <title> Delete Account </title>
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
  		<h3> Delete Account</h3>
  	</div>
    <form id='pform' action ="delete.php" method="POST">
    	<?php
    		include 'errors.php';
    	?>
    	<div class="input-group">
    		<label>Confirm your password :</label>
    		<input type="password" name="pass" placeholder="password">	 	
    	</div>
    	<div>
    		<input class="pbtn" type="submit" name="delete" value="Delete Account">		
    	</div>
    
    </form>  
  </div>
 </body>
</html>