<?php
    include 'conn.php';
    $wishcartID = $_POST['wishcartID'];
    $RemoveQuery = "DELETE FROM wishcart WHERE wishcartID = '$wishcartID' ";
    mysqli_query($conn,$RemoveQuery);
?>