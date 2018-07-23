<?php
	//include 'session.php';
  include 'conn.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Advertisement</title>

  <?php include 'link.php'; ?>

</head>
<body>

<?php 
  if(isset($_SESSION['ui'])) {
      include 'navlog.php';
  }
    else {  include 'nav.php'; }
?>

  <?php include 'footer.php'; ?>

</body>
</html>