<?php 
	$conn = mysqli_connect("localhost","root","","onlineauction");
	if(mysqli_connect_errno()){
		echo "Error acuured while connecting with database".mysqli_connect_errno();
	}
 ?>