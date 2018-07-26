<?php

session_start();

$mobile = $_SESSION["mobile"];

//echo $mobile . "session mobile ";
$con = mysqli_connect("localhost","root","","onlineauction");
if(isset($_POST['changepass'])) {
	$opass = $_POST['opass'];
	$npass = $_POST['npass'];
	$cpass = $_POST['cpass'];

	$oldmobile = mysqli_query($con,"select * from buyer where mobile = '$mobile'");
	$resultset = mysqli_fetch_row($oldmobile);

	if($resultset[6] == $opass){
		if($npass == $cpass){
			$q = mysqli_query($con ,"update buyer set password = '$npass' where mobile = '$mobile'");
			if ($q) {
				echo "password changed" ;
			}
		}else {
			echo "pass dont match";
		}
	}else{
		echo "old pass didnt match";
	}

}

 ?>
