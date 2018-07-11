<?php
	//session_start();
	//include 'conn.php';
	include 'session.php';
	$mobile = $_SESSION['ms'];
	$aname = "";
	$description = "";
	$specification = "";
	$SD = "";
	$ST = "";
	$ED = "";
	$ET = "";
	$basePrice = "";
	$errors = array();
?>
<html>
<head>
	<title>Create Auction</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/manu.css">
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" type="text/css" href="css/auction.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <a id="logo" class="navbar-brand" href="home.php">Auction</a>
  <form id="f1" class="form-inline" action="/action_page.php" method="POST">
    <input id="inp1" class="form-control mr-sm-2" type="text" placeholder="Search product,brand or more" size="70">
    <button id="btn1" class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
  </form>
  <ul class="navbar-nav">
    <li style="margin-left: 88px;" class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION['us']; ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="profile.php">Profile</a>
        <a class="dropdown-item" href="auctions.php">Auctions</a>
        <a class="dropdown-item" href="orders.php">Orders</a>
        <a class="dropdown-item" href="wishlist.php">Wishlist</a>
        <a class="dropdown-item" href="logout.php">logout</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a id="more" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        More
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="help.php">24*7 help</a>
        <a class="dropdown-item" href="about.php">About</a>
        <a class="dropdown-item" href="advertice.php">Advertice</a>
      </div>
    </li>
  </ul>
</nav>
<?php
	if(isset($_POST['create'])) {
		$auctionID = uniqid('AID');
		$catagory = $_POST['catagory'];
		$aname = $_POST['aname'];
		$description = $_POST['description'];
		$specification = $_POST['specification'];
		date_default_timezone_set("Asia/Calcutta");
		$nowDT = date("Y-m-d H:i:s");
		$ND = date("Y-m-d");
		$NT = date("H:i:s");
		$SD = $_POST['startDate'];
		$ED = $_POST['endDate'];
		$ST = $_POST['startTime'];
		$ET = $_POST['endTime'];

		$SDE = explode('-', $SD);	$intSDE = array();
		$EDE = explode('-', $ED);	$intEDE = array();
		$NDE = explode('-', $ND);	$intNDE = array();

		$STE = explode(':', $ST);	$intSTE = array();
		$ETE = explode(':', $ET);	$intETE = array();
		$NTE = explode(':', $NT);	$intNTE = array();

		
		array_push($intNDE, (int)$NDE[0]);
		array_push($intNDE, (int)$NDE[1]);
		array_push($intNDE, (int)$NDE[2]);

		array_push($intSDE, (int)$SDE[0]);
		array_push($intSDE, (int)$SDE[1]);
		array_push($intSDE, (int)$SDE[2]);

		array_push($intEDE, (int)$EDE[0]);
		array_push($intEDE, (int)$EDE[1]);
		array_push($intEDE, (int)$EDE[2]);

		

		array_push($intNTE, (int)$NTE[0]);
		array_push($intNTE, (int)$NTE[1]);


		array_push($intSTE, (int)$STE[0]);
		array_push($intSTE, (int)$STE[1]);


		array_push($intETE, (int)$ETE[0]);
		array_push($intETE, (int)$ETE[1]);



		$startDT = $SD." ".$ST.":00";
		$endDT = $ED." ".$ET.":00";

		$basePrice = $_POST['basePrice'];
		$commision = 0;
		if(empty($aname)) {	array_push($errors, "Auction Name is required"); }
		if(empty($specification)) {	array_push($errors, "Auction Specification is required"); }
		if(empty($startDT)) { array_push($errors, "startDT is required"); }
		if(empty($endDT)) { array_push($errors, "endDT is required"); }
		if(empty($nowDT)) { array_push($errors, "nowDT is required"); }
		if(empty($basePrice)){	array_push($errors, "basePrice cannot be empty"); }
		if($basePrice >= 10000) { $commision = 100; }

		if($intNDE[0] > $intSDE[0] || $intNDE[1] > $intSDE[1] || $intNDE[2] > $intSDE[2]){ array_push	($errors ,"starting date is inalid." );}
		if($intSDE[0] > $intEDE[0] || $intSDE[1] > $intEDE[1] || $intSDE[2] > $intEDE[2]){ array_push	($errors ,"ending date is inalid." );}
		if(($intSDE[0] - $intNDE[0]) >= 1 || ($intSDE[1] - $intNDE[1]) >=1 || ($intSDE[2] - $intNDE[2]) > 5) { array_push($errors, "auction can only set 5 day ahead from now."); }
		if(($intEDE[0] - $intSDE[0]) >= 1 || ($intEDE[1] - $intSDE[1]) >=1 || ($intEDE[2] - $intSDE[2]) > 3) { array_push($errors, "auction can last maximum 3 day from strating date"); }
	
		if(($STE[0] - $NTE[0]) <= 1 && $STE[1] != $NTE[1]) {array_push($errors, "auction start must start after 1 hour.");}

		if(count($errors) == 0) {
			$insertQuery = "INSERT INTO auction (auctionID, name, description, specification, nowDT, startDT, endDT,  basePrice, commision, userID, catagory) VALUES('$auctionID' ,'$aname' , '$description' , '$specification', '$nowDT' , '$startDT' , '$endDT' , '$basePrice', '$commision' , '$userID' , '$catagory')";
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
		              if(mysqli_num_rows($result) == 1){
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
		              if(mysqli_num_rows($result) == 1){
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
		              if(mysqli_num_rows($result) == 1){
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
		              if(mysqli_num_rows($result) == 1){
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
		              if(mysqli_num_rows($result) == 1){
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

<div>
	<div style="width: 50%;" class="header">
		<h3 style="color: white;">Create Auction</h3>
	</div>
	<form id='pform' style="width: 50%;" action="" method="POST" enctype="multipart/form-data">
		<?php include('errors.php'); ?>

		<p> <sup style="color: red;">*</sup> Auction Type: </p>
		<div class="styled-select blue semi-square">
		<select name="catagory">
			<option value="mobile">mobile</option>
			<option value="laptop">laptop</option>
			<option value="home">home</option>
		</select>
		</div>
		<div class="input-group">
			<label> <sup style="color: red;">*</sup> Auction Name: </label>
			<input type="text" name="aname" placeholder="Auction Name"
			value = "<?php echo $aname; ?>">
		</div>
		<div class="input-group">
			<label> Auction Description: </label>
			<input type="textbox" name="description" placeholder="Description"
			value = "<?php echo $description; ?>">
		</div>
		<div class="input-group">
			<label> <sup style="color: red;">*</sup> Auction Specification: </label>
			<input type="textbox" name="specification" placeholder="specification"
			value = "<?php echo $specification; ?>">
		</div>
		<div class="input-group">
			<label> <sup style="color: red;">*</sup> Start Date: </label>
			<input type="date" name="startDate"
			value = "<?php echo $SD; ?>">
		</div>
		<div class="input-group">
			<label> <sup style="color: red;">*</sup> End Date: </label>
			<input type="date" name="endDate" value = "<?php echo $ED; ?>">
		</div>
		<div class="input-group">
			<label> <sup style="color: red;">*</sup> Start Time: </label>
			<input type="time" name="startTime" value = "<?php echo $ST; ?>">
		</div>
		<div class="input-group">
			<label> <sup style="color: red;">*</sup> End Time: </label>
			<input type="time" name="endTime" value = "<?php echo $ET; ?>">
		</div>
		<div class="input-group">
			<label> <sup style="color: red;">*</sup> Base Price: </label>
			<input type="text" name="basePrice" placeholder="base Price" value="<?php echo $basePrice; ?>">
		</div>
		<div>
			<p style="color: blue;"> Images </p>
			<input type="file" name="file1">
			<input type="file" name="file2">
			<input type="file" name="file3">
			<input type="file" name="file4">
			<input type="file" name="file5">
		</div>
		<div>
			<input class="pbtn" type="submit" name="create" value="Create">
		</div>
	</form>
</div>

</body>
</html>
