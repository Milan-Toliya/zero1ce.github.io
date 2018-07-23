<?php

$i=1;
while ($i<=5){

//closing PHP
?>

        <form name="X" action="thispage.php" method="POST">
             <input type="text" name="trekking">
             <p>hello</p>
             <input type="submit">
        </form>;

<?php 
//opening PHP 

    $i=$i+1;
}
?>











var c = document.getElementById('b').value;
            if(c == 1) {
               alert("kanji");
             } else {
              <?php echo("location.href = 'reglog.php';"); ?>  
             }













<script type="text/javascript">
	if(isset($_SESSION['ui'])) {
        

      } else {
    $(document).ready(function(){
        $("#elebutton").click(function(e){
            e.preventDefault();  //add this line to prevent reload
      	 <?php	header('loaction: reglog.php'); ?>
        });
      });
} 
</script>




            var color = clicked ? 'red' : 'blue';
            $(this).css('background-color', color);
            clicked = !clicked;









<?php
  //include 'session.php';
  include 'conn.php';
  session_start();

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

        <script type="text/javascript">
          function a() {
            var c = document.getElementById('b').value;
            alert(c);
          }
    function setColor(btn,hrt) {
        var wish = document.getElementById(btn);
        var auc = document.getElementById(hrt).value;
        if (wish.style.color == "red") { 
            wish.style.color = "gray";        
        }else {
            wish.style.color = "red";
            alert("kkk");
        }
    }


          var <?php echo "elecnt".$counter; ?> = 0;
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

                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "elebutton".$counter; ?> value = <?php echo "elebutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "elebutton".$counter  ?>" , "<?php echo "heart".$counter; ?>") '><i class="fa fa-heart"></i></button>

                  <button id="b" value="<?php if(isset($_SESSION['ui'])){ echo "set"; } else { echo "unset"; } ?>" onclick="a();" > Ok </button>


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

  <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Land & Property</b></h5>
        </div>
        <div class="col-6">
          <a href="all_electronics.php"><button class="float-right btn btn-info">View All</button></a>
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

        <script type="text/javascript">
    function setColor(btn,hrt) {
        var wish = document.getElementById(btn);
        var auc =document.getElementById(hrt).value;
        if (wish.style.color == "red") { 
            wish.style.color = "gray";        
        }else {
            wish.style.color = "red";
        }
    }


          var <?php echo "landcnt".$counter; ?> = 0;
              $(document).ready(function(){
      $("<?php echo "#landbutton".$counter ?>").click(function(e){
          e.preventDefault();  //add this line to prevent reload
          if(<?php echo "landcnt".$counter; ?> == 0){
            $.ajax({type:"post", url:"addajax.php" });
            <?php echo "landcnt".$counter; ?> = 1;
          }else{
            $.ajax({type:"post", url:"removeajax.php" });
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
                  <input type="hidden" name= "aid" id=<?php echo "heart".$counter; ?> value=<?php  echo $row[0]; ?> >
                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "landbutton".$counter; ?> value = <?php echo "landbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "landbutton".$counter  ?>" , "<?php echo "heart".$counter; ?>") '><i class="fa fa-heart"></i></button>
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

    <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Art</b></h5>
        </div>
        <div class="col-6">
          <a href="all_electronics.php"><button class="float-right btn btn-info">View All</button></a>
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

        <script type="text/javascript">
    function setColor(btn,hrt) {
        var wish = document.getElementById(btn);
        var auc =document.getElementById(hrt).value;
        if (wish.style.color == "red") { 
            wish.style.color = "gray";        
        }else {
            wish.style.color = "red";
        }
    }


          var <?php echo "artcnt".$counter; ?> = 0;
              $(document).ready(function(){
      $("<?php echo "#artbutton".$counter ?>").click(function(e){
          e.preventDefault();  //add this line to prevent reload
          if(<?php echo "artcnt".$counter; ?> == 0){
            $.ajax({type:"post", url:"addajax.php" });
            <?php echo "artcnt".$counter; ?> = 1;
          }else{
            $.ajax({type:"post", url:"removeajax.php" });
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
                  <input type="hidden" name= "aid" id=<?php echo "heart".$counter; ?> value=<?php  echo $row[0]; ?> >
                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "artbutton".$counter; ?> value = <?php echo "artbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "artbutton".$counter  ?>" , "<?php echo "heart".$counter; ?>") '><i class="fa fa-heart"></i></button>
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

    <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Vehical</b></h5>
        </div>
        <div class="col-6">
          <a href="all_electronics.php"><button class="float-right btn btn-info">View All</button></a>
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

        <script type="text/javascript">
    function setColor(btn,hrt) {
        var wish = document.getElementById(btn);
        var auc =document.getElementById(hrt).value;
        if (wish.style.color == "red") { 
            wish.style.color = "gray";        
        }else {
            wish.style.color = "red";
        }
    }


          var <?php echo "vehcnt".$counter; ?> = 0;
              $(document).ready(function(){
      $("<?php echo "#vehbutton".$counter ?>").click(function(e){
          e.preventDefault();  //add this line to prevent reload
          if(<?php echo "vehcnt".$counter; ?> == 0){
            $.ajax({type:"post", url:"addajax.php" });
            <?php echo "vehcnt".$counter; ?> = 1;
          }else{
            $.ajax({type:"post", url:"removeajax.php" });
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
                  <input type="hidden" name= "aid" id=<?php echo "heart".$counter; ?> value=<?php  echo $row[0]; ?> >
                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "vehbutton".$counter; ?> value = <?php echo "vehbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "vehbutton".$counter  ?>" , "<?php echo "heart".$counter; ?>") '><i class="fa fa-heart"></i></button>
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












//imp
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

        <script type="text/javascript">
              function setColor(btn,hrt) {
        var wish = document.getElementById(btn);
        var auc =document.getElementById(hrt).value;
        if (wish.style.color == "red") { 
            wish.style.color = "gray";        
        }else {
            wish.style.color = "red";
        }
    }

      var <?php echo "landcnt".$counter; ?> = 0;
        $(document).ready(function(){
        $("<?php echo "#landbutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            var <?php echo "k".$counter; ?> = document.getElementById("<?php echo "heart".$counter ?>").value;
            if(<?php echo "landcnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
              });
              <?php echo "landcnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
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

                  <input type="hidden" name= "aid" id=<?php echo "heart".$counter; ?> value=<?php  echo $row[0]; ?> >
                  <input type="hidden" name="uid" id="b" value="<?php if(isset($_SESSION['ui'])){ echo "set"; } else { echo "unset"; } ?>">

                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "landbutton".$counter; ?> value = <?php echo "landbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "landbutton".$counter  ?>" , "<?php echo "heart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>

                  <button id="b" value="<?php if(isset($_SESSION['ui'])){ echo "set"; } else { echo "unset"; } ?>" onclick="a();" > Ok </button>



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

        <script type="text/javascript">
              function setColor(btn,hrt) {
        var wish = document.getElementById(btn);
        var auc =document.getElementById(hrt).value;
        if (wish.style.color == "red") { 
            wish.style.color = "gray";        
        }else {
            wish.style.color = "red";
        }
    }

      var <?php echo "artcnt".$counter; ?> = 0;
        $(document).ready(function(){
        $("<?php echo "#artbutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            var <?php echo "k".$counter; ?> = document.getElementById("<?php echo "heart".$counter ?>").value;
            if(<?php echo "artcnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
              });
              <?php echo "artcnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
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

                  <input type="hidden" name= "aid" id=<?php echo "heart".$counter; ?> value=<?php  echo $row[0]; ?> >
                  <input type="hidden" name="uid" id="b" value="<?php if(isset($_SESSION['ui'])){ echo "set"; } else { echo "unset"; } ?>">

                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "artbutton".$counter; ?> value = <?php echo "artbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "artbutton".$counter  ?>" , "<?php echo "heart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>

                  <button id="b" value="<?php if(isset($_SESSION['ui'])){ echo "set"; } else { echo "unset"; } ?>" onclick="a();" > Ok </button>



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

        <script type="text/javascript">
              function setColor(btn,hrt) {
        var wish = document.getElementById(btn);
        var auc =document.getElementById(hrt).value;
        if (wish.style.color == "red") { 
            wish.style.color = "gray";        
        }else {
            wish.style.color = "red";
        }
    }

      var <?php echo "vehcnt".$counter; ?> = 0;
        $(document).ready(function(){
        $("<?php echo "#vehbutton".$counter ?>").click(function(e){
            e.preventDefault();  //add this line to prevent reload
            var <?php echo "k".$counter; ?> = document.getElementById("<?php echo "heart".$counter ?>").value;
            if(<?php echo "vehcnt".$counter; ?> == 0){
              $.ajax({ type:"post" , url:"addajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
              });
              <?php echo "vehcnt".$counter; ?> = 1;
            }else{
             $.ajax({ type:"post" , url:"removeajax.php" , 
                data: { aid: <?php echo "k".$counter; ?> }
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

                  <input type="hidden" name= "aid" id=<?php echo "heart".$counter; ?> value=<?php  echo $row[0]; ?> >
                  <input type="hidden" name="uid" id="b" value="<?php if(isset($_SESSION['ui'])){ echo "set"; } else { echo "unset"; } ?>">

                  <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "vehbutton".$counter; ?> value = <?php echo "vehbutton".$counter; ?>  name="wishlist" onclick='setColor("<?php echo "vehbutton".$counter  ?>" , "<?php echo "heart".$counter; ?>" ) ' ><i class="fa fa-heart"></i></button>

                  <button id="b" value="<?php if(isset($_SESSION['ui'])){ echo "set"; } else { echo "unset"; } ?>" onclick="a();" > Ok </button>



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