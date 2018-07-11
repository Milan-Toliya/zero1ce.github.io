<?php
include 'session.php';
$mobile = $_SESSION['ms'];
$errors = array();
if(isset($_POST['changepass'])) {
	$opass = $_POST['opass'];
	$opass= md5($opass);
	$npass = $_POST['npass'];
	$cpass = $_POST['cpass'];
	$password = mysqli_query($conn,"select password from user where mobile = '$mobile'");
	$resultset = mysqli_fetch_row($password);
	if($resultset[0] == $opass){
		if($npass != ''){
			if($npass == $cpass){
				$npass=md5($npass);
				$q = mysqli_query($conn ,"update user set password = '$npass' where mobile = '$mobile'");
				if ($q) {
					$_SESSION['msg'] = "Password Changed Successfully" ;
                    $_SESSION['ps'] = $npass;        
					header('location:profile.php');
				}
			}else {	array_push($errors ,  "Confirm Password did not match"); }
		}else {	array_push($errors , "password filed must not be empty"); }
	}else{ array_push($errors , "old password is wrong"); }
}
?>
<html>

<head>

	<title> Change password in online auction </title>
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

<body >

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
        <?php echo $_SESSION['us']; ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="profile.php"> Profile</a>
        <a class="dropdown-item" href="#">Order</a>
        <a class="dropdown-item" href="#">WishList</a>
      <a class="dropdown-item" href="logout.php">logout</a>
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
    <div class = "header">
    	<h3 style="color: white;"> Change Password </h3>
    </div>
		<form id="pform" class="content" method="POST" action="">
			<?php include 'errors.php'; ?>
			<div class = "input-group">
				 <label> Old Password: </label>  
				 <input type="password" name="opass">   
			</div>

			<div class = "input-group">
				 <label> New Password: </label>  
				 <input type="password" name="npass">  
			</div>

			<div class = "input-group">
				 <label> Confirm password: </label>  
				 <input type="password" name="cpass">
			</div>
			<div>
				<input class="pbtn" type="submit" name="changepass" value="Change Password">
			</div>	 	
		</form>
	</div>
			
</body>
</html>
