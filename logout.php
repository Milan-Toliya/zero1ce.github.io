<?php
	session_start();
    unset($_SESSION['ms']);
    unset($_SESSION['ps']);
    header('location: index.php');
 ?> 