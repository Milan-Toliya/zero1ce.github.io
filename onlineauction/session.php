<?php
  include 'con.php';
  session_start();
  $mobile = $_SESSION['ms'];
  $password = $_SESSION['ps'];
  $query = "SELECT * FROM buyer WHERE mobile = '$mobile' AND password = '$password'";
  $result = mysqli_query($con , $query);
  if(mysqli_num_rows($result) != 1){
  	header('location:index.php');
  }
?>
