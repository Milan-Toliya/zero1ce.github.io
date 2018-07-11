<?php
  include 'conn.php';
  session_start();
  $mobile = $_SESSION['ms'];
  $password = $_SESSION['ps'];
  $query = "SELECT * FROM user WHERE mobile = '$mobile' AND password = '$password'";
  $result = mysqli_query($conn , $query);
  if(mysqli_num_rows($result) != 1){
  	header('location: index.php');
  }else{
  	$resultset = mysqli_query($conn,"select * from user where mobile = '$mobile'");
  	$resultset = mysqli_fetch_row($resultset);
  	$_SESSION['uis'] = $resultset[0];
  	$_SESSION['us'] = $resultset[1];
  	$userID = $_SESSION['uis'];
  	$userName = $_SESSION['us'];
  }
?>
