<?php	
	session_start();
    unset($_SESSION['ui']);
    unset($_SESSION['us']);
    header('location: index.php');
 ?> 