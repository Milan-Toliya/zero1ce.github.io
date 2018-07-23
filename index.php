<?php
  //include 'session.php';
  include 'conn.php';
  session_start();

  // check session for user wishlist
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

        <?php
        // select wishlist of user  
        $q = "SELECT * FROM wishcart WHERE userID = '$userID' AND wishAuctionID = '$row[0]' ";
        $color = mysqli_query($conn , $q);
        $wishcartID = mysqli_fetch_row($color);
         ?>

        <script type="text/javascript">
        
        //change wishlist heart color red or gray
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

        // add and remove wishlist through AJAX.
        var <?php echo "elecnt".$counter; ?> = <?php if(mysqli_num_rows($color) != 1) {echo "0";} else { echo "1"; } ?>;
        $(document).ready(function(){
        $("<?php echo "#elebutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            var <?php echo "aid".$counter; ?> = document.getElementById("<?php echo "eleheart".$counter ?>").value;
            var wcid = "<?php echo $wishcartID[0]; ?>";
            if(<?php echo "elecnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "aid".$counter; ?> }
              });
              <?php echo "elecnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { wishcartID: wcid }
              });
              <?php echo "elecnt".$counter; ?> = 0;
            }

        });
      });
        </script>

         
        <div class="col-6 col-sm-3"><div class="card-body text-left">
               <a style = "color: Black;" href="#"><img style="max-width: 320px; height:240px;" src="auctionIMG/<?php echo $row[10]; ?>" class="rounded" alt="Cinque Terre">
                <div class="row"> 
                  <div class="col-9">
                  <b> <?php echo $row[1]; ?> </b>
                  </a>
                  </div>
                  <div class="col-3">

                  <!-- fetch value of auction id and set into heart id -->  
                  <input type="hidden" name= "aid" id=<?php echo "eleheart".$counter; ?> value=<?php  echo $row[0]; ?> >

                  <!-- set heart color when page is load -->
                  <?php
                    if(mysqli_num_rows($color) == 1) {
                      $color = "red";
                    } else {
                      $color = "gray";
                    }
                   ?>

                   <!-- Create button with id , value , onclick function for wishlist -->
                  <button style= "border: none; color:<?php echo $color; ?>; background-color: white; float: right; cursor: pointer;" id=<?php echo "elebutton".$counter; ?> value = <?php echo "elebutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "elebutton".$counter  ?>" , "<?php echo "eleheart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>


                  </div>
                </div>

                <!-- Print dynamic bid , base price -->
                 <?php $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";} ?>
               </div></div>
      <?php } ?>
      </div>          
    </div>
  <hr>


      <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Land & Property</b></h5>
        </div>
        <div class="col-6">
          <a href="all_land.php"><button class="float-right btn btn-info">View All</button></a>
        </div>
      </div>
    <?php  
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'land'" ); ?>
        <div class="row">
        <?php $counter = 0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }?>

        <?php
        // select wishlist of user  
        $q = "SELECT * FROM wishcart WHERE userID = '$userID' AND wishAuctionID = '$row[0]' ";
        $color = mysqli_query($conn , $q);
        $wishcartID = mysqli_fetch_row($color);
         ?>

        <script type="text/javascript">
        
        //change wishlist heart color red or gray
      function setColor(landbtn,landhrt) {
        var wish = document.getElementById(landbtn);
        var auc =document.getElementById(landhrt).value;

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

        // add and remove wishlist through AJAX.
        var <?php echo "landcnt".$counter; ?> = <?php if(mysqli_num_rows($color) != 1) {echo "0";} else { echo "1"; } ?>;
        $(document).ready(function(){
        $("<?php echo "#landbutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            var <?php echo "aid".$counter; ?> = document.getElementById("<?php echo "landheart".$counter ?>").value;
            var wcid = "<?php echo $wishcartID[0]; ?>";
            if(<?php echo "landcnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "aid".$counter; ?> }
              });
              <?php echo "landcnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { wishcartID: wcid }
              });
              <?php echo "landcnt".$counter; ?> = 0;
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

                  <!-- fetch value of auction id and set into heart id -->  
                  <input type="hidden" name= "aid" id=<?php echo "landheart".$counter; ?> value=<?php  echo $row[0]; ?> >

                  <!-- set heart color when page is load -->
                  <?php
                    if(mysqli_num_rows($color) == 1) {
                      $color = "red";
                    } else {
                      $color = "gray";
                    }
                   ?>

                   <!-- Create button with id , value , onclick function for wishlist -->
                  <button style= "border: none; color:<?php echo $color; ?>; background-color: white; float: right; cursor: pointer;" id=<?php echo "landbutton".$counter; ?> value = <?php echo "landbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "landbutton".$counter  ?>" , "<?php echo "landheart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>


                  </div>
                </div>

                <!-- Print dynamic bid , base price -->
                 <?php $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";} ?>
               </div></div>
      <?php } ?>
      </div>          
    </div>
  <hr>


      <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Art</b></h5>
        </div>
        <div class="col-6">
          <a href="all_art.php"><button class="float-right btn btn-info">View All</button></a>
        </div>
      </div>
    <?php  
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'art'" ); ?>
        <div class="row">
        <?php $counter = 0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }?>

        <?php
        // select wishlist of user  
        $q = "SELECT * FROM wishcart WHERE userID = '$userID' AND wishAuctionID = '$row[0]' ";
        $color = mysqli_query($conn , $q);
        $wishcartID = mysqli_fetch_row($color);
         ?>

        <script type="text/javascript">
        
        //change wishlist heart color red or gray
      function setColor(artbtn,arthrt) {
        var wish = document.getElementById(artbtn);
        var auc =document.getElementById(arthrt).value;

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

        // add and remove wishlist through AJAX.
        var <?php echo "artcnt".$counter; ?> = <?php if(mysqli_num_rows($color) != 1) {echo "0";} else { echo "1"; } ?>;
        $(document).ready(function(){
        $("<?php echo "#artbutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            var <?php echo "aid".$counter; ?> = document.getElementById("<?php echo "artheart".$counter ?>").value;
            var wcid = "<?php echo $wishcartID[0]; ?>";
            if(<?php echo "artcnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "aid".$counter; ?> }
              });
              <?php echo "artcnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { wishcartID: wcid }
              });
              <?php echo "artcnt".$counter; ?> = 0;
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

                  <!-- fetch value of auction id and set into heart id -->  
                  <input type="hidden" name= "aid" id=<?php echo "artheart".$counter; ?> value=<?php  echo $row[0]; ?> >

                  <!-- set heart color when page is load -->
                  <?php
                    if(mysqli_num_rows($color) == 1) {
                      $color = "red";
                    } else {
                      $color = "gray";
                    }
                   ?>

                   <!-- Create button with id , value , onclick function for wishlist -->
                  <button style= "border: none; color:<?php echo $color; ?>; background-color: white; float: right; cursor: pointer;" id=<?php echo "artbutton".$counter; ?> value = <?php echo "artbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "artbutton".$counter  ?>" , "<?php echo "artheart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>


                  </div>
                </div>

                <!-- Print dynamic bid , base price -->
                 <?php $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";} ?>
               </div></div>
      <?php } ?>
      </div>          
    </div>
  <hr>


      <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Vehical</b></h5>
        </div>
        <div class="col-6">
          <a href="all_vehical.php"><button class="float-right btn btn-info">View All</button></a>
        </div>
      </div>
    <?php  
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'vehical'" ); ?>
        <div class="row">
        <?php $counter = 0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }?>

        <?php
        // select wishlist of user  
        $q = "SELECT * FROM wishcart WHERE userID = '$userID' AND wishAuctionID = '$row[0]' ";
        $color = mysqli_query($conn , $q);
        $wishcartID = mysqli_fetch_row($color);
         ?>

        <script type="text/javascript">
        
        //change wishlist heart color red or gray
      function setColor(vehbtn,vehhrt) {
        var wish = document.getElementById(vehbtn);
        var auc =document.getElementById(vehhrt).value;

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

        // add and remove wishlist through AJAX.
        var <?php echo "vehcnt".$counter; ?> = <?php if(mysqli_num_rows($color) != 1) {echo "0";} else { echo "1"; } ?>;
        $(document).ready(function(){
        $("<?php echo "#vehbutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            var <?php echo "aid".$counter; ?> = document.getElementById("<?php echo "vehheart".$counter ?>").value;
            var wcid = "<?php echo $wishcartID[0]; ?>";
            if(<?php echo "vehcnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "aid".$counter; ?> }
              });
              <?php echo "vehcnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { wishcartID: wcid }
              });
              <?php echo "vehcnt".$counter; ?> = 0;
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

                  <!-- fetch value of auction id and set into heart id -->  
                  <input type="hidden" name= "aid" id=<?php echo "vehheart".$counter; ?> value=<?php  echo $row[0]; ?> >

                  <!-- set heart color when page is load -->
                  <?php
                    if(mysqli_num_rows($color) == 1) {
                      $color = "red";
                    } else {
                      $color = "gray";
                    }
                   ?>

                   <!-- Create button with id , value , onclick function for wishlist -->
                  <button style= "border: none; color:<?php echo $color; ?>; background-color: white; float: right; cursor: pointer;" id=<?php echo "vehbutton".$counter; ?> value = <?php echo "vehbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "vehbutton".$counter  ?>" , "<?php echo "vehheart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>


                  </div>
                </div>

                <!-- Print dynamic bid , base price -->
                 <?php $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";} ?>
               </div></div>
      <?php } ?>
      </div>          
    </div>



  <?php include 'footer.php'; ?>

</body>

</html>