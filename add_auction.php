<?php
	include 'session.php';
	//include 'conn.php';
  	//session_start();

	$msgs = array();
  	$warns = array();
  	$errors = array();
 	
	$aname = "";
	$description = "";
	$specification = "";
	$SD = "";
	$ST = "";
	$ED = "";
	$ET = "";
	$basePrice = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Create Auction</title>
	
   <?php include 'link.php'; ?>

</head>
<body>
	<?php
	if(isset($_POST['create'])) {
		$auctionID = uniqid('AID');
		$catagory = $_POST['catagory'];
		$aname = $_POST['aname'];
		$description = $_POST['description'];
		$specification = $_POST['specification'];
		date_default_timezone_set("Asia/Calcutta");
		$SD = $_POST['startDate'];
		$ED = $_POST['endDate'];
		$ST = $_POST['startTime'];
		$ET = $_POST['endTime'];


		$qstartDT = $SD." ".$ST.":00";
		$qendDT = $ED." ".$ET.":00";
		$qnowDT = date("Y-m-d H:i:s");

		$startDT = $SD." ".$ST.":00";
		$endDT = $ED." ".$ET.":00";
		$nowDT = date("Y-m-d H:i:s");

		$startDT = date_create($startDT);
			$endDT = date_create($endDT);
		$nowDT = date_create($nowDT);


		// $SDE = explode('-', $SD);	$intSDE = array();
		// $EDE = explode('-', $ED);	$intEDE = array();
		// $NDE = explode('-', $ND);	$intNDE = array();

		// $STE = explode(':', $ST);	$intSTE = array();
		// $ETE = explode(':', $ET);	$intETE = array();
		// $NTE = explode(':', $NT);	$intNTE = array();

		
		// array_push($intNDE, (int)$NDE[0]);
		// array_push($intNDE, (int)$NDE[1]);
		// array_push($intNDE, (int)$NDE[2]);

		// array_push($intSDE, (int)$SDE[0]);
		// array_push($intSDE, (int)$SDE[1]);
		// array_push($intSDE, (int)$SDE[2]);

		// array_push($intEDE, (int)$EDE[0]);
		// array_push($intEDE, (int)$EDE[1]);
		// array_push($intEDE, (int)$EDE[2]);

		

		// array_push($intNTE, (int)$NTE[0]);
		// array_push($intNTE, (int)$NTE[1]);


		// array_push($intSTE, (int)$STE[0]);
		// array_push($intSTE, (int)$STE[1]);


		// array_push($intETE, (int)$ETE[0]);
		// array_push($intETE, (int)$ETE[1]);




		$basePrice = $_POST['basePrice'];
		$commision = 0;
		if(empty($aname)) {	array_push($errors, "Auction Name is required"); }
		if(empty($specification)) {	array_push($errors, "Auction Specification is required"); }
		if(empty($startDT)) { array_push($errors, "startDT is required"); }
		if(empty($endDT)) { array_push($errors, "endDT is required"); }
		if(empty($nowDT)) { array_push($errors, "nowDT is required"); }
		if(empty($basePrice)){	array_push($errors, "basePrice cannot be empty"); }
		if($basePrice >= 10000) { $commision = 100; }

		if($nowDT>$startDT){ array_push	($errors ,"starting date/time is invalid." );}
		if($startDT>$endDT){ array_push	($errors ,"ending date is invalid." );}
		
		$interval = date_diff($nowDT,$startDT);
		if(($interval->format('%a'))>5) { array_push($errors, "auction can only set 5 day ahead from now."); }
		$interval = date_diff($endDT,$startDT);
		if(($interval->format('%a'))>3) { array_push($errors, "auction can last maximum 3 day from strating date"); }

		// if(($STE[0] - $NTE[0]) <= 1 && $STE[1] != $NTE[1]) {array_push($errors, "auction start must start after 1 hour.");}

		if(count($errors) == 0) {
			$insertQuery = "INSERT INTO auction (auctionID, name, description, specification, nowDT, startDT, endDT,  basePrice, commision, userID, catagory) VALUES('$auctionID' ,'$aname' , '$description' , '$specification', '$qnowDT' , '$qstartDT' , '$qendDT' , '$basePrice', '$commision' , '$userID' , '$catagory')";
		//	echo $insertQuery;
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

	<?php include 'navlog.php'; ?>

	 <div class="container">
        <div>
           <h3 style="border-radius: .25rem .25rem 0rem 0rem; margin-top: 80px; margin-bottom: 0px; background-color: #6c757d; text-align: center; color: white;">Create Auction</h3>
        </div>
       <div style="margin-bottom: 20px; padding-top: 15px; padding-bottom: 15px; border: solid 1px #e1e2e3; box-shadow: 0px 2px 3px 1px #e1e2e3; border-radius: 0rem 0rem .25rem .25rem;" class="container card">
        
        <?php include 'msgs.php';include 'errors.php'; include 'warnings.php'; ?>
        <form class="content" action="" method="post" enctype="multipart/form-data">
    	

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> Auction Type </span>
				</div>
				<select class="form-control" name="gender">
					<option value="electronics">Electronics</option>
					<option value="land">Land & Property</option>
					<option value="art">Art</option>
					<option value="vehical">Vehical</option>
				</select>
			</div>

			<div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup>Auction Name </span>
	            </div>
	            <input type="text" class="form-control" placeholder="Auction Name"  name="aname" value="<?php echo $aname; ?>" >
	        </div>	    

	        <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> Description </span>
	            </div>
	            <input type="text" class="form-control" placeholder="Description"  name="description" value="<?php echo $description; ?>" >
	         </div>	    

	         <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> Specification </span>
	            </div>
	            <input type="text" class="form-control" placeholder="Specification"  name="specification" value="<?php echo $specification; ?>" >
	         </div>	    

	         <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> Start Date </span>
	            </div>
	            <input type="date" class="form-control" placeholder="Start Date"  name="startDate" value="<?php echo $SD; ?>" >
	         </div>	    

	         <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> Enad Date </span>
	            </div>
	            <input type="date" class="form-control" placeholder="End Date"  name="endDate" value="<?php echo $ED; ?>" >
	         </div>	    

	         <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> Start Time </span>
	            </div>
	            <input type="time" class="form-control" placeholder="Start Time"  name="startTime" value="<?php echo $ST; ?>" >
	         </div>	    

	         <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> End Time</span>
	            </div>
	            <input type="time" class="form-control" placeholder="End Time"  name="endTime" value="<?php echo $ET; ?>" >
	         </div>	    

	         <div class="input-group mb-3">
	            <div class="input-group-prepend">
	    	        <span class="input-group-text" style="width: 125px;"><sup style="color: red;">*</sup> Base Price </span>
	            </div>
	            <input type="text" class="form-control" placeholder="Base Price"  name="basePrice" value="<?php echo $basePrice; ?>" >
	         </div>	    

	        <div class="row">
	            <div class="col-sm-1"></div>
	            <div class="col-6 col-sm-2">
	             <div class="custom-file mb-3">
	              	<input type="file" class="custom-file-input" id="customFile" name="file1">
	              	<label class="custom-file-label" for="customFile">Image1</label>
	              </div>
	          	</div>
	            <div class="col-6 col-sm-2">
	             <div class="custom-file mb-3">
	              <input type="file" class="custom-file-input" id="customFile" name="file2">
	              <label class="custom-file-label" for="customFile">Image2</label>
	             </div>
	          	</div>
	            <div class="col-6 col-sm-2">
	             <div class="custom-file mb-3">
	              <input type="file" class="custom-file-input" id="customFile" name="file3">
	              <label class="custom-file-label" for="customFile">Image3</label>
	             </div>
	         	</div>
	            <div class="col-6 col-sm-2">
	             <div class="custom-file mb-3">
	              <input type="file" class="custom-file-input" id="customFile" name="file4">
	              <label class="custom-file-label" for="customFile">Image4</label>
	             </div>
	         	</div>
	            <div class="col-6 col-sm-2">
	             <div class="custom-file mb-3">
	              <input type="file" class="custom-file-input" id="customFile" name="file5">
	              <label class="custom-file-label" for="customFile">Image5</label>
	             </div>
	          	</div>
	            <div class="col-sm-1"></div>             
          </div>

          <button style="width: 100%;" type="submit" class="btn btn-primary" name="create">Create</button>

		</form>
		</div>
	</div>

<?php include 'footer.php'; ?>

</body>
</html>