<?php
  include 'session.php';
  //include 'conn.php';
  //session_start();
  $msgs = array();
  $warns = array();
  $errors = array();

  if(isset($_POST['Edit'])) {
      $auctionID = $_POST['aid'];
      $select =mysqli_query($conn,"select * from auction Where auctionID = '$auctionID' ");
      $select = mysqli_fetch_row($select);
  } else {
    $_SESSION['warns']="Please select Auction which you want to edit.";
    header('location: auctions.php');
  }

  if(isset($_POST['update'])) {

    $auctionID = $select[0];
    $aname = $_POST['aname'];
    $description = $_POST['description'];
    $specification = $_POST['specification'];
    $basePrice = $_POST['basePrice'];
    
    if(empty($aname)) { array_push($errors, "Auction Name is required"); }
    if(empty($specification)) { array_push($errors, "Auction Specification is required"); }
    if(empty($basePrice)){  array_push($errors, "basePrice cannot be empty"); }

    if(count($errors) == 0) {
     $insertQuery = "UPDATE auction SET name = '$aname', description = '$description', specification = '$specification', basePrice = '$basePrice' where auctionID = '$auctionID' ";
    //  echo $insertQuery;
      mysqli_query($conn,$insertQuery);
      if (!empty($_FILES['file1']['name'])) {
        // Where the file is going to be stored
          $target_dir = "auctionIMG/";
          $file = $_FILES['file1']['name'];
          $path = pathinfo($file);
          $filename = $path['filename'];
          $img1 = "1".$auctionID;
          $ext = $path['extension'];
          $size = $_FILES['file1']['size'];
              if($size != 0) {
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'bmp'||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'ICO' || $ext == 'GIF' || $ext == 'BMP') {
                   $temp_name = $_FILES['file1']['tmp_name'];
                   $path_filename_ext = $target_dir.$img1.".".$ext;
                  if(count($errors) == 0){
                   $q = mysqli_query($conn ,"update auction set img1 = '$img1.$ext' where auctionID = '$auctionID'");
                   mysqli_query($conn,$q);
                   move_uploaded_file($temp_name,$path_filename_ext);

                 }else{ array_push($errors,"something went wrong while uploading file1" );}
                }else { array_push($errors,"file1 is not not image" ) ;}
            }else { array_push($errors,"file1 size must be less than 20MB");}
        }

        if (!empty($_FILES['file2']['name'])) {
        // Where the file is going to be stored
          $target_dir = "auctionIMG/";
          $file = $_FILES['file2']['name'];
          $path = pathinfo($file);
          $filename = $path['filename'];
          $img2 = "2".$auctionID;
          $ext = $path['extension'];
          $size = $_FILES['file2']['size'];
              if($size != 0) {
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'bmp'||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'ICO' || $ext == 'GIF' || $ext == 'BMP') {
                   $temp_name = $_FILES['file2']['tmp_name'];
                   $path_filename_ext = $target_dir.$img2.".".$ext;
                  if(count($errors) == 0){
                   $q = mysqli_query($conn ,"update auction set img2 = '$img2.$ext' where auctionID = '$auctionID'");
                   mysqli_query($conn,$q);
                   move_uploaded_file($temp_name,$path_filename_ext);
                 }else{ array_push($errors,"something went wrong while uploading file2" );}
               }else { array_push($errors,"file2 is not not image" ) ;}
            }else { array_push($errors,"file2 size must be less than 20MB");}
        }

        if (!empty($_FILES['file3']['name'])) {
        // Where the file is going to be stored
          $target_dir = "auctionIMG/";
          $file = $_FILES['file3']['name'];
          $path = pathinfo($file);
          $filename = $path['filename'];
          $img3 = "3".$auctionID;
          $ext = $path['extension'];
          $size = $_FILES['file3']['size'];
              if($size != 0) {
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'bmp'||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'ICO' || $ext == 'GIF' || $ext == 'BMP') {
                   $temp_name = $_FILES['file3']['tmp_name'];
                   $path_filename_ext = $target_dir.$img3.".".$ext;
                  if(count($errors) == 0){
                   $q = mysqli_query($conn ,"update auction set img3 = '$img3.$ext' where auctionID = '$auctionID'");
                   mysqli_query($conn,$q);
                   move_uploaded_file($temp_name,$path_filename_ext);
                 }else{ array_push($errors,"something went wrong while uploading file3" );}
               }else { array_push($errors,"file3 is not not image" ) ;}
            }else { array_push($errors,"file3 size must be less than 20MB");}
        }

        if (!empty($_FILES['file4']['name'])) {
        // Where the file is going to be stored
          $target_dir = "auctionIMG/";
          $file = $_FILES['file4']['name'];
          $path = pathinfo($file);
          $filename = $path['filename'];
          $img4 = "4".$auctionID;
          $ext = $path['extension'];
          $size = $_FILES['file4']['size'];
              if($size != 0) {
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'bmp'||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'ICO' || $ext == 'GIF' || $ext == 'BMP') {
                   $temp_name = $_FILES['file4']['tmp_name'];
                   $path_filename_ext = $target_dir.$img4.".".$ext;
                  if(count($errors) == 0){
                   $q = mysqli_query($conn ,"update auction set img4 = '$img4.$ext' where auctionID = '$auctionID'");
                   mysqli_query($conn,$q);
                   move_uploaded_file($temp_name,$path_filename_ext);
                 }else{ array_push($errors,"something went wrong while uploading file4" );}
               }else { array_push($errors,"file4 is not not image" ) ;}
            }else { array_push($errors,"file4 size must be less than 20MB");}
        }

        if (!empty($_FILES['file5']['name'])) {
        // Where the file is going to be stored
          $target_dir = "auctionIMG/";
          $file = $_FILES['file5']['name'];
          $path = pathinfo($file);
          $filename = $path['filename'];
          $img5 = "5".$auctionID;
          $ext = $path['extension'];
          $size = $_FILES['file5']['size'];
              if($size != 0) {
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'bmp'||$ext == 'JPG' || $ext == 'JPEG' || $ext == 'PNG' || $ext == 'ICO' || $ext == 'GIF' || $ext == 'BMP') {
                   $temp_name = $_FILES['file5']['tmp_name'];
                   $path_filename_ext = $target_dir.$img5.".".$ext;
                  if(count($errors) == 0){
                   $q = mysqli_query($conn ,"update auction set img5 = '$img5.$ext' where auctionID = '$auctionID'");
                   mysqli_query($conn,$q);
                   move_uploaded_file($temp_name,$path_filename_ext);
                 }else{ array_push($errors,"something went wrong while uploading file5" );}
                }else { array_push($errors,"file5 is not not image" ) ;}
            }else { array_push($errors,"file5 size must be less than 20MB");}
        }
      header('location:auctions.php');
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Edit Auction</title>

  <?php include 'link.php'; ?>

</head>
<body>

  <?php include 'navlog.php'; ?>

  <div class="container">
        <div>
           <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Edit Auction</h3>
        </div>
       <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; border: solid 1px #e1e2e3; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
        
        <form class="content" action="" method="post" enctype="multipart/form-data">
        <?php include 'msgs.php';include 'errors.php'; ?>
          
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[9]"; ?> >
             <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="file1">
              <label class="custom-file-label" for="customFile">Choose file</label>
              </div></div>
            <div class="col-6 col-sm-2"><img width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[10]"; ?> >
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="file2">
              <label class="custom-file-label" for="customFile">Choose file</label>
              </div></div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[11]"; ?> >
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="file3">
              <label class="custom-file-label" for="customFile">Choose file</label>
              </div></div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[12]"; ?> >
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="file4">
              <label class="custom-file-label" for="customFile">Choose file</label>
              </div></div>
            <div class="col-6 col-sm-2"><img  width="100%" id="img"  class="center" alt="Your Profile" src = <?php echo "auctionIMG/$select[13]"; ?> >
              <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="file5">
              <label class="custom-file-label" for="customFile">Choose file</label>
              </div></div>
            <div class="col-sm-1"></div>             
          </div>


          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 115px;">Name</span>
            </div>
            <input type="text" class="form-control" placeholder="Item Name" id="usr" name="aname" value="<?php echo $select[1] ?>" >
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 115px;">Description</span>
            </div>
            <input type="text" class="form-control" placeholder="Item Description" id="usr" name="description" value="<?php echo $select[2] ?>" >
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 115px;">Specification</span>
            </div>
            <input type="text" class="form-control" placeholder="Item Specification" id="usr" name="specification" value="<?php echo $select[3] ?>">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" style="width: 115px;" >Base Price</span>
            </div>
            <input type="text" class="form-control" placeholder="Item Base Price" id="usr" name="basePrice" value="<?php echo $select[7] ?>">
          </div>
        <div>
          <input type="hidden" name="Edit">
          <input type="hidden" name="aid" value="<?php echo $auctionID?>">
          <button style="width: 100%;" type="submit" class="btn btn-secondary" name="update" value="Update">Update</button>
        </div>              
            </div>
            <div class="col-sm-1"></div>
          </div>

      </form>
      </div>
  </div>

  <?php include 'footer.php'; ?>

  </body>
  </html>