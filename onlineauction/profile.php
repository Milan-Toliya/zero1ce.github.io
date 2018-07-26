<?php 
    include 'session.php'; 
      	if (isset($_SESSION['msg'])) {
		$msgs =array();
		array_push($msgs, $_SESSION['msg']);
		unset($_SESSION['msg']);
	}
?>
<html>
  <head>
    <title> Welcome to online auction </title>
    <link rel="stylesheet" type="text/css" href="CSS/default.css">
  </head>
  <body>
    <div>
      <?php include 'msgs.php'; ?>
    </div>
    <div>
      <?php
      if (mysqli_num_rows($result) == 1){
        $query = "select * from buyer where mobile = '$mobile'";
        $result = mysqli_query($con,$query);
      }
      $resultset = mysqli_fetch_row($result);
      $_SESSION['edituser'] = $resultset;
      echo "<img src = 'uploads/$resultset[8]'> <br/>";
      echo "your first name is ".$resultset[1]."<br>";
      echo "your last name is ".$resultset[2]."<br>";
      echo "your email id is ".$resultset[3]."<br>";
      echo "your mobile number is ".$resultset[4]."<br>";
      echo "your birth date is ".$resultset[5]."<br>";
       ?>
    <a href="editProfile.php">Edit Profile</a> </br></br>
    <form action="delete.php" method="post">
    <input type = "submit" name="del" value="Delete account">
  </form>

  </div>
  </body>
</html>
