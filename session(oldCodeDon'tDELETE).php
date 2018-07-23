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













//// 22/07/2018   Index With Wishlist comleted;
<?php
  //include 'session.php';
  include 'conn.php';
  session_start();
   if(isset($_SESSION['ui'])) {
   $userID = $_SESSION['ui'];
  }else {
    $userID = "milan";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Welcome To OnlineAuction</title>
 
  <?php include 'link.php'; ?>

  <style type="text/css">
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      height: 280px;
    }
    
  </style>

</head>

<body>

   <?php 
  if(isset($_SESSION['ui'])) {
      include 'navlog.php';
  }
    else {  include 'nav.php'; }
   ?>

  <!-- top main carosel slider -->
  <div style="margin-top:0px; padding-left: 0px; padding-right: 0px;" id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img1.jpg" alt="Los Angeles" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="img2.jpg" alt="Chicago" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="img3.jpg" alt="New York" width="1100" height="500">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>


    <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Electronics</b></h5>
        </div>
        <div class="col-6">
          <a href="all_electronics.php"><button class="float-right btn btn-info">View All</button></a>
        </div>
      </div>
    <?php  
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'electronics'" ); ?>
        <div class="row">
        <?php $counter = 0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }?>

        <?php $q1 = "SELECT * FROM wishcart WHERE userID = '$userID' AND wishAuctionID = '$row[0]' ";
        $color1 = mysqli_query($conn , $q1); ?>

        <script type="text/javascript">
        
      function setColor(elebtn,elehrt) {
        var wish = document.getElementById(elebtn);
        var auc =document.getElementById(elehrt).value;

        var ui = "<?php if(isset($_SESSION['ui'])) { echo "set"; } else { echo "unset"; } ?>";
        if(ui == "set") {
          if (wish.style.color == "red") { 
             wish.style.color = "gray";        
          }else {
             wish.style.color = "red";
        }  
      }else {
        window.location="reglog.php";
      }
    }
        
        var <?php echo "elecnt".$counter; ?> = <?php if(mysqli_num_rows($color1) != 1) {echo "0";} else { echo "1"; } ?>;
        $(document).ready(function(){
        $("<?php echo "#elebutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            
            var <?php echo "k".$counter; ?> = document.getElementById("<?php echo "heart".$counter ?>").value;
            if(<?php echo "elecnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
              });
              <?php echo "elecnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
              });
              <?php echo "elecnt".$counter; ?> = 0;
            }

        });
      });
        </script>

         
        <div class="col-6 col-sm-3"><div class="card-body text-left">
               <a style = "color: Black;" href="#"><img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
                <div class="row"> 
                  <div class="col-9">
                  <b> <?php echo $row[1]; ?> </b>
                  </a>
                  </div>
                  <div class="col-3">

                  <input type="hidden" name= "aid" id=<?php echo "heart".$counter; ?> value=<?php  echo $row[0]; ?> >

                  <?php
                  //$query = "select * from user where mobile = '$mobile'";
                  $q = "SELECT * FROM wishcart WHERE userID = '$userID' AND wishAuctionID = '$row[0]' ";
                  $color = mysqli_query($conn , $q);
                    if(mysqli_num_rows($color) == 1) {
                      $color = "red";
                    } else {
                      $color = "gray";
                    }
                   ?>
                  <button style= "border: none; color:<?php echo $color; ?>; background-color: white; float: right; cursor: pointer;" id=<?php echo "elebutton".$counter; ?> value = <?php echo "elebutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "elebutton".$counter  ?>" , "<?php echo "heart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>


                  </div>
                </div>
                 <?php $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";} ?>
               </div></div>
      <?php } ?>
      </div>          
    </div>
  <hr>



  <?php include 'footer.php'; ?>

</body>

</html>