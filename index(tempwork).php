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

</head>

<body>

  <script>
    var count = 1;
    function setColor(btn) {
        var wish = document.getElementById(btn);
        if (count == 0) {
          //remove item from wishcart table
            wish.style.color = "gray";
            count = 1;
        }else {
          // add item to wishcart table
            wish.style.color = "red";
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

<?php  
    $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'electronics'" ); ?>
      <div class="row">
     <?php $counter =0;
      while($row = mysqli_fetch_array($result)) {
      $counter += 1;
      if($counter > 4) {
        break;
      }?>
       <div class="col-6 col-sm-3"><div class="card-body text-left">
             <a style = "color: Black;" href="#"><img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
              <div class="row"> 
                <div class="col-9">
                <b><?php 
                echo $row[1];?>
                </b>
                </a>
                </div>
                <div class="col-3">
                <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id=<?php echo "button".$counter; ?> name="wishlist" onclick='setColor("<?php echo "button".$counter; ?>");'><i class="fa fa-heart"></i></button>
                </div>
              </div><?php 
              $bp=$row[7]; $bid=$row[16]; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?>
              <br/>
               <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";}?>
             </div></div>
        <?php } ?>
    </div>          
</body>

</html>