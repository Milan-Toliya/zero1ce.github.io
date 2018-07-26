<?php
  include 'session.php';
  // include 'conn.php';
  // session_start();
  $msgs = array();
  $warns = array();
  $errors = array();


  // if (isset($_SESSION['warns'])) {
  //   array_push($warns, $_SESSION['warns']);
  //   unset($_SESSION['warns']);
  // }
  //   if (isset($_SESSION['msgs'])) {
  //   array_push($msgs, $_SESSION['msgs']);
  //   unset($_SESSION['msgs']);
  // }
  //   if (isset($_SESSION['errors'])) {
  //   array_push($errors, $_SESSION['errors']);
  //   unset($_SESSION['errors']);
  // }

  if(isset($_GET['aidLink'])){
    $auctionID = $_GET['aidLink'];
    $result = mysqli_query($conn, "SELECT * FROM auction WHERE auctionID='$auctionID' ");
    $select = mysqli_fetch_row($result);
  }

  if(isset($_POST['aidCB'])){
    $currentBid = $_POST['currentBid'];
    $auctionID = $_POST['aidCB'];
    mysqli_query($conn,"UPDATE auction SET currentBid = '$currentBid' WHERE auctionID = '$auctionID'");
    $result = mysqli_query($conn, "SELECT * FROM auction WHERE auctionID='$auctionID' ");
    $select = mysqli_fetch_row($result);
  }
  if(!isset($_GET['aidLink']) && !isset($_POST['aidCB'])){
    array_push($errors, "You did not have selected any product yet!");
    header('location: index.php');
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
           <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Auction</h3>
        </div>

        <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; border: solid 1px #e1e2e3; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
          <?php include 'msgs.php'; include 'errors.php'; include 'warnings.php'; ?>

                      
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[9]"; ?> >
            </div>
            <div class="col-6 col-sm-2"><img width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[10]"; ?> >
            </div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[11]"; ?> >
            </div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[12]"; ?> >
            </div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[13]"; ?> >
            </div>
            <div class="col-sm-1"></div>             
          </div>
          <hr>
          <h4 class="text-center"> Item Detail </h4>
          <p>
            <?php echo $select[2]; ?>
          </p>
          <hr>
          <h4 class="text-center"> Specification </h4>
          <p>
            <?php echo $select[3]; ?>
          </p>
          <hr>     

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 125px;">Start Time </span>
              </div>
              <input type="text" class="form-control" placeholder="Start Time"  name="startTime" value="<?php echo $select[5]; ?>" >
           </div>     

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 125px;">End Time</span>
              </div>
              <input type="text" class="form-control" placeholder="End Time"  name="endTime" value="<?php echo $select[6]; ?>" >
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width: 125px;">Base Price</span>
              </div>
              <input type="text" class="form-control" placeholder="Start Time"  name="startTime" value="<?php echo $select[7]; ?>" >
           </div>

          <form method="post" action="">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span style="width: 125px;" class="input-group-text">Current Bid</span>
            </div>
            <input type="text" class="form-control" placeholder="Current Bid" name="currentBid" value="<?php echo"$select[16]";?>">
            <input type="hidden" name="aidCB" value=<?php echo $auctionID; ?> >
          </div>
          <div>
            <button style="width: 100%;" type="submit" class="btn btn-secondary" name="bidCB" value="Continue">Bid</button>
          </div>
        </form>
      </div>


</body>
</html>


