<?php
  //include 'session.php';
  include 'conn.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Land & Property</title>

  <style type="text/css">
    
    /*start here wish list heart */
     a:link{
      color: gray;
      text-decoration: none;
     }
     a:visited{
      color: darkgray;
      text-decoration: none;  
     }
     a:hover{
      color: red;
      text-decoration: none;

    }
    button:focus {
      outline: 0;
    }
    /*end here wish list heart */
  </style>

</head>
<body>
  
  <?php 
  if(isset($_SESSION['ui'])) {
      include 'navlog.php';
  }
    else {  include 'nav.php'; }
  ?>


    <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
      <div class="row">
        <div class="col-6">
          <h5><b>Land & Property</b></h5>
        </div>
        <div class="col-6">
          <button class="float-right btn btn-info">View All</button>
        </div>
      </div>
    <?php  
      $result = mysqli_query($conn, "SELECT * FROM auction where catagory = 'land'" );
        echo '<div class="row">';
  
        while($row = mysqli_fetch_array($result)) {
         echo ' <div class="col-6 col-sm-3"><div class="card-body text-left">
                <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
                <div class="row"> 
                  <div class="col-9">';
                  echo $row[18];
                  echo '</div>
                  <div class="col-3">
                  </div>
                </div>';
                echo $row[1];
                echo '<br/>';
                echo $row[6];
                echo '</div><hr></div>';
      }
      echo '</div>';          
    ?>
  </div>
 
  <?php include 'footer.php'; ?>

</body>
</html>

   
              
            