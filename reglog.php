<?php
	$errors = array();
	if(isset($_POST['reglog'])) {
		include 'conn.php';
		session_start();
		$mobile = $_POST['mobile'];
		$_SESSION['ms'] = $mobile;
		if(empty($mobile)){
			array_push($errors , "Mobile Number is Empty");
		}
		else if(!preg_match("/^\d{10}+$/", $mobile)){
			array_push($errors , "Enter only 10 digit numbers");
		}
		else{
			$result = mysqli_query($conn,"select mobile from user where mobile = '$mobile'");
			$resultset = mysqli_fetch_row($result);
			if($resultset[0] == $mobile) {
				header('Location:log.php');
			} 
			else {
				header('Location:reg.php');
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
	<div class="header">
		<h3 style="color: white;">Online Auction</h3>
	</div>
	<form id="pform" class="content" action="reglog.php" method="POST">
   		<?php include 'errors.php'; ?> 		
		<div class="input-group">
			<label> Enter Mobile: </label>
			<input type="text" name="mobile" placeholder="Enter Mobile Number">
		</div>
		<div >
			<input type="submit"  class="pbtn" name="reglog" value="Continue">	
		</div>	
	</form>
</body>

</html>
