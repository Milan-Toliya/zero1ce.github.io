<?php
    include 'conn.php';
    session_start();
    $userID = $_SESSION['ui'];
    $auctionID = $_POST['aid'];
    $wishcartID = uniqid('WID');
    $insertQuery = "INSERT INTO wishcart (wishcartID, userID, wishAuctionID) VALUES ('$wishcartID' , '$userID' , '$auctionID')";
    mysqli_query($conn,$insertQuery);
?>