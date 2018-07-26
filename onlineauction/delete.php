<?php
  include 'con.php';    
  if(isset($_POST['delete'])) {
    session_start();
    $password = $_POST['pass'];
    $password = md5($password);
    $mobile = $_SESSION['ms'];
    $errors = array();
    $ps = $_SESSION['ps'];
    if($password != "") {
      if($password == $ps) {
        $q = "delete from buyer WHERE mobile = '$mobile'";
        $result = mysqli_query($con , $q);
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
  <link rel="stylesheet" type="text/css" href="CSS/default.css">
</head>
<body>
  <div>
  	<div class="header">
  		<h3> Delete Account</h3>
  	</div>
    <form action ="delete.php" method="POST">
    	<?php
    		include 'errors.php';
    	?>
    	<div class="input-group">
    		<label>Confirm your password :</label>
    		<input type="password" name="pass" placeholder="password">	 	
    	</div>
    	<div>
    		<input class="btn" type="submit" name="delete" value="Delete Account">		
    	</div>
    
    </form>  
  </div>
 </body>
</html>