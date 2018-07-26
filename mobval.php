<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
</head>
<body>
	 <!-- PHP Code -->
<?php
if(isset($_POST['register'])){
    $mobile=$_POST['mobile'];
  if(empty($mobile)){
      echo '<script>alert("Mobile Number field Empty...!!!!!!");</script>';
    }elseif(!preg_match("/^\d{10}+$/", $mobile)){

      echo '<script>alert("Only Numbers with 10 Digits required");</script>';
    }else{
                      echo "<center><h2>Mobile Number:-$mobile</h2></center>";
            }
            }
 ?>
	 <!-- PHP Code -->
<center><h1>Mobile Number Validation in PHP</h1></center>

<form action="" method="POST">

<table align="center" style="margin-top: 200px;border: solid #ffaaff 2px;">
   <tr>
        <td>Mobile No</td>
        <td><input type="text" name="mobile"></td>
     </tr>
     <tr><td></td><td align="center"><input type="submit" name="register" value="Register"></td></tr>
</table>
</form>

</body>
</html>
