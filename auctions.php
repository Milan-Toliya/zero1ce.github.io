<?php
  include 'session.php';
  // include 'conn.php';
  // session_start();
  $msgs = array();
  $warns = array();
  $errors = array();


  if (isset($_SESSION['warns'])) {
    array_push($warns, $_SESSION['warns']);
    unset($_SESSION['warns']);
  }
    if (isset($_SESSION['msgs'])) {
    array_push($msgs, $_SESSION['msgs']);
    unset($_SESSION['msgs']);
  }
    if (isset($_SESSION['errors'])) {
    array_push($errors, $_SESSION['errors']);
    unset($_SESSION['errors']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Your Acutions</title>

  <?php include 'link.php'; ?>

</head>
<body>

  <?php include 'navlog.php'; ?>

      <div class="container">
        <div>
           <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Your Auctions
            <input style="float: right; height: 33px;" class="btn btn-primary" type="button" name="createAuction" value="Add Auction" onclick="window.location.href='add_auction.php'">
           </h3>
        </div>

        <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; border: solid 1px #e1e2e3; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
          <?php include 'msgs.php'; include 'errors.php'; include 'warnings.php'; ?>

          <div class="row">
          <?php
            $resultset = mysqli_query($conn, "SELECT * FROM auction where userID = '$userID' " );
            while($row = mysqli_fetch_array($resultset)) {
          ?>
                <div style="height: 500px;" class="col-6 col-sm-3">
                  <div class="card-body text-left">
                    <a style = "color: Black;" href="#">
                     <img style="max-width: 320px; height:300px;" class="rounded" alt="Item" width="100%" src=<?php echo "auctionIMG/"."$row[9]";?> >
                      <div class="row">
                          <b> <?php $row[1]; ?> </b>
                    </a>
                      </div>
                      <?php $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                      <br/>
                       <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";} ?>

                   </div>

                   <form method="POST" action="edit_auction.php">
                      <input type="hidden" name= "aid" value=<?php  echo $row[0]; ?> >
                      <button style="width: 80%;" type="submit" class="btn btn-primary" name="Edit">Edit</button>
                      <button style="width: 15%;" type="submit" class="btn btn-primary" name="Edit"><i style="font-size: 20px;" class="fa fa-trash" aria-hidden="true"></i></button>  
                   </form>
              </div>
         <?php }?>
      </div>
    </div> </div>

  <?php include 'footer.php'; ?>

</body>
</html>
