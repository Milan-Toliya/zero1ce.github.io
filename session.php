 <?php
  include 'conn.php';
  session_start();
  if (isset($_SESSION['ui'])) {
    $userID=$_SESSION['ui'];
  }else {
    header("location:index.php");
  }
?>
