<?php 
	session_start();	
	$errors = array();
	$msgs = array();
	if (isset($_SESSION['msg'])) {
		array_push($msgs, $_SESSION['msg']);
		unset($_SESSION['msg']);
	}
	include 'conn.php';
	if(isset($_POST['login'])) {
		$mobile  = $_POST['mobile'];
		$password  = $_POST['password'];
		$password = md5($password);
		$query = "SELECT * FROM user WHERE mobile = '$mobile' AND password = '$password'";
		$result = mysqli_query($conn , $query);
		$resultset = mysqli_fetch_row($result);
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['ms'] = $mobile;
			$_SESSION['ps'] = $password;
			$_SESSION['us'] = $resultset[1];
			header('location: home.php');
		}
		else {
			array_push($errors, "invalid mobile or password");
		}
	}
?>
<html>

<head>

	<title>Online Auction Register</title>
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
  <a id="logo" class="navbar-brand" href="index.php">Auction</a>
  <form id="f1" class="form-inline" action="/action_page.php" method="POST">
    <input id="inp1" class="form-control mr-sm-2" type="text" placeholder="Search product,brand or more" size="70">
    <button id="btn1" class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
  </form>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a id="reglog" class="nav-link" href="reglog.php">Login & Signup</a>
    </li>

    <li class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        More
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="help.php"> 24*7 help</a>
        <a class="dropdown-item" href="about.php">About</a>
        <a class="dropdown-item" href="advertice.php">Advertice</a>
      </div>
    </li>
  </ul>
</nav>
	<div>
	<div class="header">
		<h3 style="color: white;">Login</h3>	
	</div>
	<form id="pform" class="content" action="" method="POST">
		<?php include('errors.php');
			  include('msgs.php');
		 ?>
		<div class="input-group">
			<label> Mobile Number:</label>
			<input type="text" name="mobile" placeholder="Enter Mobile Number" value=
				"<?php 	
					if(isset($_SESSION['ms'])){	echo $_SESSION['ms']; }
					else{ echo "";}
				?>"
			>
		</div>
		<div class="input-group">
			<label> Enter Your Password: </label>
			<input type="password" name="password" id="pwd" placeholder="Enter password"> 
		</div>
		<div>
			<label style="text-align:left; margin: auto;">Show password</label>
			<input style="height: auto; width:auto; padding: auto; border-radius: auto;" type="checkbox" onclick="showpwd();">
			<script>
				function showpwd(){
					var x = document.getElementById("pwd");
					if(x.type === "password") {
						x.type = "text";
					}
					else {
						x.type = "password";
					}
				}
			</script>
		</div>
		<div >
			<input class="pbtn" type="submit" name="login" value="login">
			<a style="text-decoration: none; text-align: right;" href= "reg.php"> Are you new user?</a>
		</div>
	</form>
	</div>

</body>

</html>
