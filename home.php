<?php 
  include 'session.php';
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

  <script>
    var count = 1;
    function setColor(btn) {
        var property = document.getElementById(btn);
        if (count == 0) {
          //remove item from wishcart table 
            property.style.color = "gray";
            count = 1;        
        }else {
          // add item to wishcart table
            property.style.color = "red";
            count = 0;
        }
    }
    $(document).ready(function(){
      $("#button").click(function(e){
          e.preventDefault();  //add this line to prevent reload
          if(count == 0){
            $.ajax({type:"post", url:"addajax.php" });
          }else{
            $.ajax({type:"post", url:"removeajax.php" });
          }
      });
    });
  </script>

  <?php include 'navlog.php'; ?>

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
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'electronics'" );
        echo '<div class="row">';
        $counter =0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }
         echo ' <div class="col-6 col-sm-3"><div class="card-body text-left">
               <a style = "color: Black;" href="#"><img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
                <div class="row"> 
                  <div class="col-9">';
                  echo '<b>';
                  echo $row[1];
                  echo '</b>';
                  echo '</a>';
                  echo '</div>
                  <div class="col-3">
                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id="button" name="wishlist" onclick=setColor("button");><i class="fa fa-heart"></i></button>
                  </div>
                </div>';
                $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";}
               echo '</div></div>';
      }
      echo '</div>';          
    ?>
    </div>
  <hr>
   <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Land & Propery</b></h5>
        </div>
        <div class="col-6">
          <a href="all_land.php"><button class="float-right btn btn-info">View All</button></a>
        </div>
      </div>
    <?php  
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'land'" );
        echo '<div class="row">';
        $counter =0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }
         echo ' <div class="col-6 col-sm-3"><div class="card-body text-left">
               <a style = "color: Black;" href="#"><img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
                <div class="row"> 
                  <div class="col-9">';
                  echo '<b>';
                  echo $row[1];
                  echo '</b>';
                  echo '</a>';
                  echo '</div>
                  <div class="col-3">
                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id="button" name="wishlist" onclick=setColor("button");><i class="fa fa-heart"></i></button>
                  </div>
                </div>';
                $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";}
               echo '</div></div>';
      }
      echo '</div>';          
    ?>
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
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'art'" );
        echo '<div class="row">';
        $counter =0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }
         echo ' <div class="col-6 col-sm-3"><div class="card-body text-left">
               <a style = "color: Black;" href="#"><img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
                <div class="row"> 
                  <div class="col-9">';
                  echo '<b>';
                  echo $row[1];
                  echo '</b>';
                  echo '</a>';
                  echo '</div>
                  <div class="col-3">
                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id="button" name="wishlist" onclick=setColor("button");><i class="fa fa-heart"></i></button>
                  </div>
                </div>';
                $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";}
               echo '</div></div>';
      }
      echo '</div>';          
    ?>
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
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'vehical'" );
        echo '<div class="row">';
        $counter =0;
        while($row = mysqli_fetch_array($result)) {
        $counter += 1;
        if($counter > 4) {
          break;
        }
         echo ' <div class="col-6 col-sm-3"><div class="card-body text-left">
               <a style = "color: Black;" href="#"><img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
                <div class="row"> 
                  <div class="col-9">';
                  echo '<b>';
                  echo $row[1];
                  echo '</b>';
                  echo '</a>';
                  echo '</div>
                  <div class="col-3">
                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id="button" name="wishlist" onclick=setColor("button");><i class="fa fa-heart"></i></button>
                  </div>
                </div>';
                $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
                <br/>
                 <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";}
               echo '</div></div>';
      }
      echo '</div>';          
    ?>
    </div>
  <hr>
  <?php include 'footer.php'; ?>

</body>

</html>